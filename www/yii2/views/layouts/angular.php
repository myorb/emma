<html ng-app>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
    <script src="//use.edgefonts.net/vast-shadow:n4:all.js"></script>
    <script src="//use.edgefonts.net/vast-shadow:n4:all;megrim.js"></script>
    <style>

        body {
            background: #13756D;
        }

        .todo-wrapper {
            background: #55B6AE;
            width: 100%;
        }

        h2 {
            font-size: 2em;

            font-family: megrim, fantasy;
            background: #1CA89C;
            padding: 40px;
            margin: 0;
            color: #333;
            text-align: center;
        }
        .emphasis {
            font-family: vast-shadow, sans-serif;
            font-size: 4em;
        }

        ul {
            padding: 0px;
            margin: 0px;
        }

        li {
            font-family: megrim, fantasy;
            font-size: 2em;
            padding: 40px;

            background: #65d8cb; /* Old browsers */
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#65d8cb), to(#72f4e9));
            background: -webkit-linear-gradient(#65d8cb 0%, #72f4e9 100%);
            background: -moz-linear-gradient(#65d8cb 0%, #72f4e9 100%);
            background: -o-linear-gradient(#65d8cb 0%, #72f4e9 100%);
            background: linear-gradient(#65d8cb 0%, #72f4e9 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#65d8cb', endColorstr='#72f4e9',GradientType=0 );
            list-style-type: none;
            margin-left: 0px;
            padding-left: 0px;
        }

        li input[type="checkbox"] {
            width: 40px;
        }

        .done-true {
            text-decoration: line-through;
            color: #ddd;
        }

        .add-input {
            width: 60%;
            height: 20px;
            float: left;
            border: none;
            padding: 40px 0;
            font-size: 2em;
            font-family: megrim, fantasy;
            text-indent: 55px;
        }
        .add-btn {
            width: 40%;
            border: none;
            background: #29F4E3;
            padding: 0;
            height: 100px;
        h2 {
            background: #29F4E3;
            padding: 0;
            font-size: 4em;
            font-family: megrim, fantasy;
            color: #333;
        }
        }

        .clear-btn {
            width: 100%;
            border: none;
            height: 100px;
            background: #13756D;
            font-size: 2em;
            font-family: megrim, fantasy;
            color: #aaa;
        }
    </style>
</head>
<body>
<div class="todo-wrapper" ng-controller="TodoCtrl">
    <h2>You've got <span class="emphasis">{{getTotalTodos()}}</span> things to do</h2>
    <ul>
        <li ng-repeat="todo in todos">
            <input type="checkbox" ng-model="todo.done"/>
            <span class="done-{{todo.done}}">{{todo.text}}</span>
        </li>
    </ul>
    <form>
        <input class="add-input" placeholder="I need to..." type="text" ng-model="formTodoText" ng-model-instant />
        <button class="add-btn" ng-click="addTodo()"><h2>Add</h2></button>
    </form>

    <button class="clear-btn" ng-click="clearCompleted()">Clear completed</button>
</div>
</body>
<script>
    function TodoCtrl($scope) {

        $scope.todos = [
            {text:'Learn AngularJS', done:false},
            {text: 'Build an app', done:false}
        ];

        $scope.getTotalTodos = function () {
            return $scope.todos.length;
        };


        $scope.addTodo = function () {
            $scope.todos.push({text:$scope.formTodoText, done:false});
            $scope.formTodoText = '';
        };

        $scope.clearCompleted = function () {
            $scope.todos = _.filter($scope.todos, function(todo){
                return !todo.done;
            });
        };
    }
</script>
</html>