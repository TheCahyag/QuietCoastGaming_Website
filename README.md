# QuietCoastGaming Website

**How does this website work?**

The core functionality of the website revolves around three php object:
- Forum.php
- Thread.php
- Post.php

These three objects have a hierarchical relation ship:  
Forum -0...\*-> Thread -0...\*-> Post  
  
A forum object is created when the site admin requests a new forum to be created via forumcreation.php.
That object's is initialized and its state is modified to preference, it is then serialized and that
information is stored in /forum/data/serialized_forum_objects. Each file in there represents a different forum.
The main data that is stored in the forum are an array of threads (initially there are 0 threads). Once a
thread is created via threadcreation.php I STILL NEED TO FINSIH THIS
