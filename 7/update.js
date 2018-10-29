var MongoClient=require('mongodb').MongoClient;
var url="mongodb://localhost:27017/";

MongoClient.connect(url, function(err, db){
	if (err) throw err;
	var dbo=db.db("activity10");
	var myquery={"item":"journal"};
	var newvalues={$set:{"height":30.4}};
	dbo.collection("items").updateOne(myquery, newvalues, function(err, res){
		if (err) throw err;
		console.log("1 document updated");
		db.close();
	});
});

MongoClient.connect(url, function(err, db){
	if (err) throw err;
	var dbo=db.db("activity10");
	var myquery={"item":"mousepad"};
	dbo.collection("items").deleteOne(myquery, function(err, obj){
		if (err) throw err;
		console.log("1 document deleted");
		db.close();
	});
});
