angular.module('project', ['projectApi', 'inoutApi']).
config(function($routeProvider) {
    $routeProvider.
    when('/'         , {controller:ListCtrl   , templateUrl:BASE_URL+'projects/template_list'  }).
    when('/edit/:id' , {controller:EditCtrl   , templateUrl:BASE_URL+'projects/template_detail'}).
    when('/new'      , {controller:CreateCtrl , templateUrl:BASE_URL+'projects/template_detail'}).
    when('/inout'    , {controller:ListInOut  , templateUrl:BASE_URL+'projects/template_inout_list'}).
    when('/inout/add', {controller:CreateInOut, templateUrl:BASE_URL+'projects/template_inout_detail'}).
    when('/edit/inout/:id', {controller:EditInOut  , templateUrl:BASE_URL+'projects/template_inout_detail'}).
    otherwise({redirectTo:'/'});
});

function ListCtrl($scope, $location, Project, InOut) {
    $scope.projects = Project.query();
    $scope.destroy = function(Project_) {
        Project_.destroy(function() {
            $scope.projects = Project.query();
            //$location.path('/');
        });
    };
}

function ListInOut($scope, $location, Project, InOut) {
    $scope.orders = InOut.query();
    $scope.destroy = function(InOut_) {
        InOut_.destroy(function() {
            $scope.orders = InOut.query();
            //$location.path('/');
        });
    };
}

function CreateCtrl($scope, $location, Project, InOut) {
    $scope.save = function() {
        Project.save($scope.project, function(project) {
            $location.path('/edit/' + project.id);
        });
    };
}

function CreateInOut($scope, $location, Project, InOut) {
    $scope.save = function() {
        InOut.save($scope.order, function(order) {
            $location.path('/inout/' + order.id);
        });
    };
}

function EditCtrl($scope, $location, $routeParams, Project, InOut) {
    var self = this;

    Project.get({id: $routeParams.id}, function(project) {
        self.original = project;
        $scope.project = new Project(self.original);
    });

    $scope.isClean = function() {
        return angular.equals(self.original, $scope.project);
    };

    $scope.destroy = function() {
        self.original.destroy(function() {
            $location.path('/');
        });
    };

    $scope.save = function() {
        $scope.project.update(function() {
            $location.path('/');
        });
    };
}

function EditInOut($scope, $location, $routeParams, Project, InOut) {
    var self = this;

    InOut.get({id: $routeParams.id}, function(order) {
        self.original = order;
        $scope.order = new InOut(self.original);
    });

    $scope.isClean = function() {
        return angular.equals(self.original, $scope.order);
    };

    $scope.destroy = function() {
        self.original.destroy(function() {
            $location.path('/inout');
        });
    };

    $scope.save = function() {
        $scope.order.update(function() {
            $location.path('/inout');
        });
    };
}

angular.module('projectApi', ['ngResource']).
factory('Project', function($resource) {
    var Project = $resource(BASE_URL + 'api/projects/:method/projects/:id', {}, {
        query:  {method:'GET'   , params: {method:'index' } , isArray:true},
        save:   {method:'POST'  , params: {method:'save'  }},
        get:    {method:'GET'   , params: {method:'edit'  }},
        remove: {method:'DELETE', params: {method:'remove'}}
    });

    Project.prototype.update = function(cb) {
        return Project.save({id: this.id}, angular.extend({}, this, {id:undefined}), cb);
    };

    Project.prototype.destroy = function(cb) {
        return Project.remove({id: this.id}, cb);
    };

    return Project;
});

angular.module('inoutApi', ['ngResource']).
factory('InOut', function($resource) {
    var InOut = $resource(BASE_URL + 'api/projects/:method/orders/:id', {}, {
        query:  {method:'GET'   , params: {method:'index' } , isArray:true},
        save:   {method:'POST'  , params: {method:'save'  }},
        get:    {method:'GET'   , params: {method:'edit'  }},
        remove: {method:'DELETE', params: {method:'remove'}}
    });

    InOut.prototype.update = function(cb) {
        return InOut.save({id: this.id}, angular.extend({}, this, {id:undefined}), cb);
    };

    InOut.prototype.destroy = function(cb) {
        return InOut.remove({id: this.id}, cb);
    };

    return InOut;
});
