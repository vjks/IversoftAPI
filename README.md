# IversoftAPI
Based on the given DB schema, this Laravel project creates a REST API.


The following end-points exist:<br> 
/users - List all users, including the name of their role, their address, and how many blog posts they have.<br>No parameters are required.<br><br>
/users/<user_id> - Display the details of a single user.<br>The user id of the user is required as a parameter.<br><br>
/blog_posts - List all blog posts.<br>No parameters are required.<br><br>
/blog_posts/<user_id>/users - List the blog posts associated with a single user.<br>The user id of the user is required as a parameter.<br><br>
/blog_post/<blog_post_id> - pass in a blog post id to get just that post.<br>A blog post id is required.<br><br>
/blog_posts - With a POST request create a new blog post with compulsory values for author and title.<br>The key-value pair for author, title and content can be entered as parameters. Only author and title are compulsory fields.<br><br> 
/users/<user_id> - Edit an user. The values that can be edited are user_roles_id, username and email. It's done through a PUT request. The key-value pair for user_roles_id, username and email can be entered as parameters. Only email is compulsary fields.<br><br>   




