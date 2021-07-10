var express = require('express');
var app = express();
var bodyParser = require('body-parser');

//var printer = require("../lib");
var printer = require('printer');
var util = require('util');
//var Iconv  = require('iconv').Iconv;

// Print Printer List
console.log("installed printers:\n"+util.inspect(printer.getPrinters(), {colors:true, depth:10}));
