# IversoftAPI
Based on the given DB schema, this Laravel project creates a REST API.


The following end-points exist:<br> 
/users - List all users, including the name of their role, their address, and how many blog posts they have.<br>
/users/<user_id> - Display the details of a single user.<br>
/blog_posts - List all blog posts.<br>
/blog_posts/<user_id>/users - List the blog posts associated with a single user.<br>
/blog_post/<blog_post_id> - pass in a blog post id to get just that post.<br>
/blog_posts - With a POST request create a new blog post with compulsory values for author and title. 
/users/<user_id> - Edit an user. The values that can be edited are user_roles_id, username and email. 




