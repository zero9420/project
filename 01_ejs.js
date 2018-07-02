var express = require('express');
var app = express();


app.set('views', './views');
app.engine('.html', require('ejs').__express);
app.set('view engine', 'html');

app.use(express.static('public'));
app.use(express.static('node_modules'));


app.get('/', function (req, res) {


	res.render('01_ejs', {title: 'Hey', message: 'Hello there'});
});


app.get('/index', function(req, res){


	res.render('index',{title:'测试模板'});
});


app.get('/static', function(req, res){


	res.render('static');
})

app.listen(3000);

console.log('端口号是:3000');