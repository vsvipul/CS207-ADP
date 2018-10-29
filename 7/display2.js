var MongoClient=require('mongodb').MongoClient;
var url="mongodb://localhost:27017/";

MongoClient.connect(url, function(err, db){
	if (err) throw err;
	var dbo=db.db("activity10");
	dbo.collection("items").find({"height":{$gt: 30}}).toArray(function(err, res){
		if (err) throw err;
		console.log(res);
		db.close();
	});
});
