<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div ng-app="myApp" ng-controller="todoCtrl">

    <h2>My Todo List</h2>

    <form ng-submit="todoAdd()">
        <input type="text" ng-model="name" size="25" placeholder="Name">
        <input type="text" ng-model="todoInput" size="50" placeholder="Note">
        <input type="submit" value="Add New">
    </form>

    <br>

    <div ng-repeat="x in todoList">
        <input type="checkbox" ng-model="x.done"> Who:<b ng-bind="x.name"></b> Task: <b ng-bind="x.todoText"></b>
    </div>

    <p><button ng-click="remove()">Remove marked</button></p>
    <script>
        var app = angular.module('myApp', ['ngResource']);
        app.factory("Item", function($resource) {
            return $resource("/api/todo/:id");
        });

        app.controller('todoCtrl', function($scope,Item) {

            Item.query(function(data) {
                $scope.todoList = data;
            });

            $scope.todoAdd = function() {
                $scope.item = new Item();
                $scope.item.todoText =$scope.todoInput;
                $scope.item.name =$scope.name;
                $scope.item.done = 0;
                Item.save($scope.item);
                $scope.todoList.push($scope.item);
                $scope.todoInput = "";
            };

            $scope.remove = function() {
                var oldList = $scope.todoList;
                $scope.todoList = [];
                angular.forEach(oldList, function(x) {
                    if (x.done == 0){
                        $scope.todoList.push(x);
                    }else{
                        Item.delete({id: x.id});
                    }

                });
            };
        });
    </script>
</div>