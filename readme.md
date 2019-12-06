## Directory Lister

A simple all-in-one directory listing script written in PHP. Just drop **only the index.php file** into the directory you'd like to list on a server. It only lists the current directory, and links directly to the files it lists, so it can't be abused to list any other directories. The icons (famfamfam's silk icons - http://www.famfamfam.com/lab/icons/silk/) are base64-encoded into the stylesheet that's included in the file, so the script doesn't need a resource folder. 

71 clean, commented lines of PHP awesomeness. Enjoy!

*****

### Quick Install (CLI)
To quickly install this script (just the index.php file), navigate to your directory in the command line interface, and paste in this command. You do need to have cURL installed, but that's available on most platforms that support php.

```
curl -O https://raw.githubusercontent.com/jpederson/directory-lister/master/index.php
```

*****

![Screenshot of Directory Lister](https://raw.githubusercontent.com/jpederson/directory-lister/master/screenshot.png)