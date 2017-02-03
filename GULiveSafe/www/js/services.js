angular.module('app.services', [])

.service('LocationService', function($q){
  
  var autocompleteService = new google.maps.places.AutocompleteService();
  var detailsService = new google.maps.places.PlacesService(document.createElement("input"));
  return {
    searchAddress: function(input) {
      var deferred = $q.defer();

      autocompleteService.getPlacePredictions({
        input: input
      }, function(result, status) {
        if(status == google.maps.places.PlacesServiceStatus.OK){
          console.log(status);
          deferred.resolve(result);
        }else{
          deferred.reject(status)
        }
      });

      return deferred.promise;
    },
    getDetails: function(placeId) {
      var deferred = $q.defer();
      detailsService.getDetails({placeId: placeId}, function(result) {
        deferred.resolve(result);
      });
      return deferred.promise;
    }
  };
})


.factory('geofenceService', function ($rootScope, $window, $q, $log, $ionicLoading) {

        var geofenceService = {
            _geofences: [],
            _geofencesPromise: null,
            createdGeofenceDraft: null,
            loadFromLocalStorage: function () {
                var result = localStorage['geofences'];
                var geofences = [];
                if (result) {
                    try {
                        geofences = angular.fromJson(result);
                    } catch (ex) {

                    }
                }
                this._geofences = geofences;
                return $q.when(this._geofences);
            },
          
            loadFromDevice: function () {
                var self = this;
                if ($window.geofence && $window.geofence.getWatched) {
                    return $window.geofence.getWatched().then(function (geofencesJson) {
                        self._geofences = angular.fromJson(geofencesJson);
                        return self._geofences;
                    });
                }
                return this.loadFromLocalStorage();
            },
            getAll: function () {
                var self = this;
                if (!self._geofencesPromise) {
                    self._geofencesPromise = $q.defer();
                    self.loadFromDevice().then(function (geofences) {
                        self._geofences = geofences;
                        self._geofencesPromise.resolve(geofences);
                    }, function (reason) {
                        $log.log("Error fetching geofences", reason);
                        self._geofencesPromise.reject(reason);
                    });
                }
                return self._geofencesPromise.promise;
            },
          
            getNextNotificationId: function () {
                var max = 0;
                this._geofences.forEach(function (gf) {
                    if (gf.notification && gf.notification.id) {
                        if (gf.notification.id > max) {
                            max = gf.notification.id;
                        }
                    }
                });
                return max + 1;
            }
        };

        return geofenceService;
    })


.factory('geolocationService', function ($q, $timeout) {
        var currentPositionCache;
        return {
            getCurrentPosition: function () {
                if (!currentPositionCache) {
                    var deffered = $q.defer();
                    navigator.geolocation.getCurrentPosition(function (position) {
                        deffered.resolve(currentPositionCache = position);
                        $timeout(function () {
                            currentPositionCache = undefined;
                        }, 10000);
                    }, function () {
                        deffered.reject();
                    });
                    return deffered.promise;
                }
                return $q.when(currentPositionCache);
            }
        };
    })


.service("ContactsService", ['$q', function($q) {

        var formatContact = function(contact) {

            return {
               "displayName"   : contact.name.formatted || contact.name.givenName + " " + contact.name.familyName || "Mystery Person",
                "emails"        : contact.emails || [],
                "phones"        : contact.phoneNumbers || [],
                "photos"        : contact.photos || []
               
            };

        };

        var pickContact = function() {

            var deferred = $q.defer();

            if(navigator && navigator.contacts) {

                navigator.contacts.pickContact(function(contact){

                    deferred.resolve( formatContact(contact) );
                });

            } else {
                deferred.reject("Bummer.  No contacts in desktop browser");
            }

            return deferred.promise;
        };

        return {
            pickContact : pickContact
        };
    }])


.factory('dataSharetoggle1',function($rootScope){
  var service = {};
  service.data = false;
  service.sendData = function(data){
      this.data = data;
      $rootScope.$broadcast('data_sharedtoggle1');
  };
  service.getData = function(){
    return this.data;
  };
  return service;
})

.factory('dataSharetoggle2',function($rootScope){
  var service = {};
  service.data = false;
  service.sendData = function(data){
      this.data = data;
      $rootScope.$broadcast('data_sharedtoggle2');
  };
  service.getData = function(){
    return this.data;
  };
  return service;
});

/*.factory('currentLocation',function($http, geolocationService){  

  var currentLocation =
  {

    Location: function(){

      $scope.latLang = {
    lat:'',
    lang:'',
    location:''
  };

  geolocationService.getCurrentPosition()
                .then(function (position) {

          $scope.latLang.lat=parseFloat(position.coords.latitude);
          $scope.latLang.lang=parseFloat(position.coords.longitude);
          var lat =$scope.latLang.lat;
          var lang =$scope.latLang.lang;
          //You can hit request upto 2300 per day on free of cost.
          var mrgdata='http://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+lang+'&sensor=true'
          $http.get(mrgdata)
              .success(function (response) {
              $scope.latLang.location=response.results[0].formatted_address;
              var currentLocation = $scope.latLang.location;
              console.log("Your Current Location is : " +$scope.latLang.location);

               return currentLocation;
            });
    }
}
}
});*/






