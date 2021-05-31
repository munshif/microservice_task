<h3>End Points</h3>

#Get all policies - GET 
http://localhost:9004/api/policies

#Create a policy - POST
http://localhost:9004/api/policies
<br>
{
name : 
type:
lead_id:
 }


#Get policy by id - GET
http://localhost:9004/api/policies/<id>  

#Get policies by lead - GET
http://localhost:9004/api/policies/bylead/<leadid>

#Delete a policy - DELETE
http://localhost:9004/api/policies/<id>  
    
#Update a policy - PUT
http://localhost:9004/api/policies/<id>  
<br>
{
name : 
type:
lead_id:
 }
