var http=require('http')
var MongoClient=require('mongodb').MongoClient;

var server=http.createServer((function(request,response)
{
	response.writeHead(200, {"Content-Type":"text/plain"});
	response.end("Hello World\n");
}));
server.listen(7000);

var url="mongodb://localhost:27017/activity10";
MongoClient.connect(url, function(err, db)
{
	if (err) throw err;
	console.log("Database created!");
	db.close();
});

url="mongodb://localhost:27017/";
MongoClient.connect(url, function(err, db) {
	if (err) throw err;
	var dbo=db.db("activity10");
	dbo.createCollection("items",function(err, res){
		if (err) throw err;
		console.log("Collection created!");
		db.close();
	});
});

MongoClient.connect(url, function(err, db) {
	if (err) throw err;
	var dbo=db.db("activity10");
	var myobj=[
		{"item":"journal", "qty":25, "tags":["blank", "red"], "size":{"h":19, "w":21, "uom":"cm" }},
		{"item":"mat", "qty":85, "tags":["gray"], "size":{"h":27.9, "w":35.5, "uom":"cm" }},
		{"item":"mousepad", "qty":25, "tags":["gel", "blue"], "size":{"h":19, "w":22.85, "uom":"cm" }}
	];
	dbo.collection("items").insertMany(myobj, function(err, res)
	{
		if (err) throw err;
		console.log("Number of documents inserted: " + res.insertedCount);
		db.close();
	});
});
