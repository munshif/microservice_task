<h3>End Points</h3>

#Get all leads - GET 
http://localhost:9005/api/leads

#Create a lead - POST
http://localhost:9005/api/leads
<br>
{
name : 
mobile:
lead_assigned_user:
 }


#Get lead by id - GET
http://localhost:9005/api/leads/<id>  

#Get leads by user - GET
http://localhost:9005/api/leads/byuser/<userid>

#Delete a lead - DELETE
http://localhost:9005/api/leads/<id>  
    
#Update a lead - PUT
http://localhost:9005/api/leads/<id>  
<br>
{
name : 
mobile:
lead_assigned_user:
 }
