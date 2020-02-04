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

*****

### Supported File Formats
The script will automatically display icons for the following file formats:

- **Scripts**: .css, .scss, .js, .json, .html, .htm, .sass, .styl, .php, .py, .asp, .aspx, .xml
- **Images/Photos**: .jpg, .gif, .jpeg, .png, .raw, .nef, .tif, .tiff, .dwg, .dwf, .dxf
- **Installer Files**: .pkg, .exe, .dmg, .apk
- **Archives**: .zip, .zipx, .tar, .gz, .rar, .bz, .bz2, .sevenz, .sit, .sitx, .a, .ar, .lz, .rz, .xz, .z, .s7z, .cab, .jar
- **Database**: .db, .sqlite, .dbf, .dat
- **Disk Images**: .iso, .img, .bin, .adf, .cdfs, .disk, .vmdk, .vcd, .vc4
- **Maps/Map Data**: .map, .shp, .shx, .geojson, .gml, .kml, .kmz, .gpx, .vct, .vdc, .osm, .dlg
- **Text Files**: .txt, .doc, .odt, .md
- **Video**: .mp4, .mkv, .mov, .flv, .wmv, .webm, .avi, .ogg, .m4v, .m4, .mpg, .mpeg, .vob
- **Audio**: .mp3, .wav, .aa, .aac, .flac, .m4p, .wma

Submit an [issue](https://github.com/jpederson/directory-lister/issues) if you'd like support for any additional file formats - I'm happy to add them as needed, so do ask.

*****

Developed with love by [James Pederson](https://jpederson.com).