## Directory Lister

A simple all-in-one directory listing script written in PHP. Just drop **only the index.php file** into the directory you'd like to list on a server. It only lists the current directory, and links directly to the files it lists, so it can't be abused to list any other directories. The icons (famfamfam's silk icons - http://www.famfamfam.com/lab/icons/silk/) are base64-encoded into the stylesheet that's included in the php file, so the script doesn't require a resource folder. 

71 clean, commented lines of PHP awesomeness. Enjoy!

*****

### Quick Install (CLI)
To quickly install this script (just the index.php file), navigate to your directory in the command line interface, and paste in this command. You do need to have cURL installed, but that's available on most platforms that support php.

```
curl -O https://raw.githubusercontent.com/jpederson/directory-lister/master/index.php
```

*****

![Screenshot of Directory Lister](https://raw.githubusercontent.com/jpederson/directory-lister/master/screenshot.png)

*****

### Supported File Formats
The script will automatically display icons for the following file formats:

- **Scripts**: .css, .scss, .js, .json, .html, .htm, .sass, .styl, .php, .py, .asp, .aspx, .xml
- **Images/Photos**: .jpg, .gif, .jpeg, .png, .raw, .nef, .tif, .tiff, .dwg, .dwf, .dxf
- **Installer Files**: .pkg, .exe, .dmg, .apk, .bat, .cmd, .command, .jar, .osx, .run
- **Archives**: .zip, .zipx, .tar, .gz, .rar, .bz, .bz2, .sevenz, .sit, .sitx, .a, .ar, .lz, .rz, .xz, .z, .s7z, .cab, .jar
- **Database**: .db, .sqlite, .dbf, .dat, .db2, .db3, .dbf, .dbs, .dbw, .dbx, .mdf, .sql
- **Disk Images**: .iso, .img, .bin, .adf, .cdfs, .disk, .vmdk, .vcd, .vc4
- **Maps/Map Data**: .map, .shp, .shx, .geojson, .gml, .kml, .kmz, .gpx, .vct, .vdc, .osm, .dlg
- **Text/Doc Files**: .ans, .ascii, .doc, .docm, .docx, .faq, .man, .msg, .md, .odt, .ort, .ott, .readme, .rtf, .txt, .wpd, .wps
- **Video**: .mp4, .mkv, .mov, .flv, .wmv, .webm, .avi, .ogg, .m4v, .m4, .mpg, .mpeg, .vob
- **Audio**: .aa, .aac, .aax, .cda, .flac, .mp3, .m4p, .m4b, .mogg, .ogg, .oga, .ra, .rm, .wma, .wav

Submit an [issue](https://github.com/jpederson/directory-lister/issues) if you'd like support for any additional file formats - I'm happy to add them as needed, so do ask.

*****

Developed with love by [James Pederson](https://jpederson.com).