var fs = require("fs");

var file = fs.readFileSync(__dirname + "/WA.txt").toString();
var lines = file.split("\n");

var state = {
    "regions" : []
};


var lastregion = "";
var lastarea = "";

for (var i = 1; i < lines.length; i++) {
    if (lines[i].startsWith("•")) {
        console.log("Region: " + lines[i])
        lastregion = lines[i];
        region.insert({ region: lines[i],
                        areas: []
             });
    } else if (lines[i].startsWith("---")) {
        console.log("Area: " + lines[i])
        region.lastarea
    } else {

    }
}

console.log(region);