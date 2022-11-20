<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Js;
use Kreait\Firebase\Database;
use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\FirestoreClient;


class OrderController extends Controller
{
  
    public function __construct()
    {
        //get access to realtime db
        $firebase = (new Factory)
        ->withServiceAccount(__DIR__.'/y76-task-firebase-adminsdk-tkios-4c955cfb3c.json')
        ->withDatabaseUri('https://y76-task-default-rtdb.europe-west1.firebasedatabase.app');
        $this->database = $firebase->createDatabase();
        // get access to firestore db
        $factory = (new Factory)->withServiceAccount(__DIR__.'/y76-task-firebase-adminsdk-tkios-4c955cfb3c.json');
        $this->firestore = $factory->createFirestore()->database();
    }

    public function index()
    {
        //get orders from orders collection
        $ordersRef = $this->firestore->collection('orders');
        $documents = $ordersRef->documents();
        
        $arr = [];
        foreach ($documents as $document) {
            array_push($arr, $document->data());   
        }
        
        return  $arr;
    }

    public function create(Request $request)
    {

        $ordersRef = $this->firestore->collection('orders');
        
        if($request['title'] && $request['total']){
            $ordersRef->add([
                "title"=> $request['title'],
                "total"=> $request['total']
            ]);
            return 'Order created successfully' ;
        }else{
            return 'Fields required';
        }
    }

}
