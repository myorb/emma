<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div ng-app="myApp" ng-controller="todoCtrl">

    <div ng-controller="ClickToEditCtrl">
        <div ng-hide="editorEnabled">
            <h2> {{title}}</h2><a href="#" ng-click="editorEnabled=!editorEnabled">Edit title</a>
        </div>
        <div ng-show="editorEnabled">
            <h2><input ng-model="title"></h2>
            <a href="#" ng-click="editorEnabled=!editorEnabled">Done editing?</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>

    <form ng-submit="todoAdd()">
        <input type="text" ng-model="name" size="25" placeholder="Name">
        <input type="text" ng-model="todoInput" size="50" placeholder="Note">
        <input type="submit" value="Add New">
    </form>


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

            $scope.todoList = Item.query();

            $scope.todoAdd = function() {
                $scope.item = new Item();

                $scope.item.todoText =$scope.todoInput;
                $scope.item.name =$scope.name;
                $scope.item.done = 0;

                Item.save($scope.item);
                $scope.todoList = Item.query();

                $scope.todoInput = "";
            };

            $scope.remove = function() {
                angular.forEach($scope.todoList, function(x) {
                    if (x.done == 1){
                        Item.delete({id: x.id});
                    }
                });
                $scope.todoList = Item.query();
            };

        });

        app.controller('ClickToEditCtrl', function($scope) {
            $scope.title = "Welcome to this demo!";
            $scope.editorEnabled = false;

            $scope.enableEditor = function() {
                $scope.editorEnabled = true;
                $scope.editableTitle = $scope.title;
            };

            $scope.disableEditor = function() {
                $scope.editorEnabled = false;
            };

            $scope.save = function() {
                $scope.title = $scope.editableTitle;
                $scope.disableEditor();
            };
        });


    </script>
</div>