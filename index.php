<?php


// get the filetype
function ext( $file ) {
    if ( is_dir( $file ) ) {
        return 'dir';
    } else {
        return pathinfo( $file )['extension'];
    }
}


// get the title, from the url
function title() {
    $url = substr( $_SERVER['REQUEST_URI'], 1 );
    if ( empty( $url ) ) $url = 'home/';
    return $url;
}


// human filesize
function human_filesize( $file ) {
    $bytes = filesize( $file );
    $decimals = 1;
    $factor = floor( ( strlen($bytes) - 1 ) / 3 );
    if ( $factor > 0 ) $sz = 'KMGT';
    return sprintf( "%.{$decimals}f", $bytes / pow( 1024, $factor ) ) . @$sz[$factor - 1] . 'B';
}


// get the file list for the current directory
$files = scandir( '.' );


// files to exclude
$exclude = array( '.', '..', '.DS_Store', 'index.php', '.git', '.gitmodules', '.gitignore', 'node_modules' );


// search files array and remove anything in the exclude array
foreach ( $exclude as $ex ) {
    if ( ( $key = array_search( $ex, $files ) ) !== false ) {
        unset( $files[$key] );
    }
}


// title bar and tiny stylesheet with all the icons encoded in it.
?><html lang="en"><head><title><?php print str_replace( '/', ' / ', title() ); ?></title><meta name="viewport" content="width=device-width"><style>@import"https://fonts.googleapis.com/css?family=Raleway&display=swap";body{padding:0;margin:0;font-family:Raleway,sans-serif;font-size:100%;line-height:100%}a{color:#007b75;text-decoration:none;background-color:#fff;display:block;margin-bottom:5px;transition:400ms all ease-in-out;padding-left:15px}a:hover{background-color:#eee;color:#001514}h1{padding:20px 10px 10px;margin:0;font-size:1.4em;border-bottom:2px solid #eee;color:#666}h1 span{color:#ddd}p{margin:0;padding:20px 10px}ul{list-style:none;padding:10px 0 20px;margin:0}ul li{padding:7px 20px 7px 30px;background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAC4SURBVCjPdZFbDsIgEEWnrsMm7oGGfZrohxvU+Iq1TyjU60Bf1pac4Yc5YS4ZAtGWBMk/drQBOVwJlZrWYkLhsB8UV9K0BUrPGy9cWbng2CtEEUmLGppPjRwpbixUKHBiZRS0p+ZGhvs4irNEvWD8heHpbsyDXznPhYFOyTjJc13olIqzZCHBouE0FRMUjA+s1gTjaRgVFpqRwC8mfoXPPEVPS7LbRaJL2y7bOifRCTEli3U7BMWgLzKlW/CuebZPAAAAAElFTkSuQmCC") left center no-repeat}ul li.css,ul li.scss,ul li.js,ul li.json,ul li.html,ul li.htm{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHtSURBVDjLjZM9T9tQFIYpQ5eOMBKlW6eWIQipa8RfQKQghEAKqZgKFQgmFn5AWyVDCipVQZC2EqBWlEqdO2RCpAssQBRsx1+1ndix8wFvfW6wcUhQsfTI0j33PD7n+N4uAF2E+/S5RFwG/8Njl24/LyCIOI6j1+v1y0ajgU64cSSTybdBSVAwSMmmacKyLB/DMKBpGkRRZBJBEJBKpXyJl/yABLTBtm1Uq1X2JsrlMnRdhyRJTFCpVEAfSafTTUlQoFs1luxBAkoolUqQZbmtJTYTT/AoHInOfpcwtVtkwcSBgrkDGYph+60oisIq4Xm+VfB0+U/P0Lvj3NwPGfHPTcHMvoyFXwpe7UmQtAqTUCU0D1VVbwTPVk5jY19Fe3ZfQny7CE51WJDXqpjeEUHr45ki9rIqa4dmQiJfMLItGEs/FcQ2ucbRmdnSYy5vYWyLx/w3EaMfLmBaDpMQvuDJ65PY8Dpnz3wpYmLtApzcrIAqmfrEgdZH1grY/a36w6Xz0DKD8ES25/niYS6+wWE8mWfByY8cXmYEJFYLkHUHtVqNQcltAvoLD3v7o/FUHsNvzlnwxfsCEukC/ho3yUHaBN5Buo17Ojtyl+DqrnvQgUtfcC0ZcAdkUeA+ye7eMru9AUGIJPe4zh509UP/AAfNypi8oj/mAAAAAElFTkSuQmCC") left center no-repeat}ul li.jpg,ul li.gif,ul li.jpeg,ul li.png{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHwSURBVDjLpZM9a1RBFIafM/fevfcmC7uQjWEjUZKAYBHEVEb/gIWFjVVSWEj6gI0/wt8gprPQykIsTP5BQLAIhBVBzRf52Gw22bk7c8YiZslugggZppuZ55z3nfdICIHrrBhg+ePaa1WZPyk0s+6KWwM1khiyhDcvns4uxQAaZOHJo4nRLMtEJPpnxY6Cd10+fNl4DpwBTqymaZrJ8uoBHfZoyTqTYzvkSRMXlP2jnG8bFYbCXWJGePlsEq8iPQmFA2MijEBhtpis7ZCWftC0LZx3xGnK1ESd741hqqUaqgMeAChgjGDDLqXkgMPTJtZ3KJzDhTZpmtK2OSO5IRB6xvQDRAhOsb5Lx1lOu5ZCHV4B6RLUExvh4s+ZntHhDJAxSqs9TCDBqsc6j0iJdqtMuTROFBkIcllCCGcSytFNfm1tU8k2GRo2pOI43h9ie6tOvTJFbORyDsJFQHKD8fw+P9dWqJZ/I96TdEa5Nb1AOavjVfti0dfB+t4iXhWvyh27y9zEbRRobG7z6fgVeqSoKvB5oIMQEODx7FLvIJo55KS9R7b5ldrDReajpC+Z5z7GAHJFXn1exedVbG36ijwOmJgl0kS7lXtjD0DkLyqc70uPnSuIIwk9QCmWd+9XGnOFDzP/M5xxBInhLYBcd5z/AAZv2pOvFcS/AAAAAElFTkSuQmCC") left center no-repeat}ul li.dir{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGrSURBVDjLxZO7ihRBFIa/6u0ZW7GHBUV0UQQTZzd3QdhMQxOfwMRXEANBMNQX0MzAzFAwEzHwARbNFDdwEd31Mj3X7a6uOr9BtzNjYjKBJ6nicP7v3KqcJFaxhBVtZUAK8OHlld2st7Xl3DJPVONP+zEUV4HqL5UDYHr5xvuQAjgl/Qs7TzvOOVAjxjlC+ePSwe6DfbVegLVuT4r14eTr6zvA8xSAoBLzx6pvj4l+DZIezuVkG9fY2H7YRQIMZIBwycmzH1/s3F8AapfIPNF3kQk7+kw9PWBy+IZOdg5Ug3mkAATy/t0usovzGeCUWTjCz0B+Sj0ekfdvkZ3abBv+U4GaCtJ1iEm6ANQJ6fEzrG/engcKw/wXQvEKxSEKQxRGKE7Izt+DSiwBJMUSm71rguMYhQKrBygOIRStf4TiFFRBvbRGKiQLWP29yRSHKBTtfdBmHs0BUpgvtgF4yRFR+NUKi0XZcYjCeCG2smkzLAHkbRBmP0/Uk26O5YnUActBp1GsAI+S5nRJJJal5K1aAMrq0d6Tm9uI6zjyf75dAe6tx/SsWeD//o2/Ab6IH3/h25pOAAAAAElFTkSuQmCC") left center no-repeat}ul li.pkg,ul li.exe,ul li.dmg{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAALnSURBVDjLfZNLaFx1HIW/e2fuzJ00w0ymkpQpiUKfMT7SblzU4kayELEptRChUEFEqKALUaRUV2YhlCLYjYq4FBeuiqZgC6FIQzBpEGpDkzHNs5PMTJtmHnfu6//7uSh2IYNnffg23zmWqtIpd395YwiRL1Q0qyIfD56cmOvUs/4LWJg40auiH6jI+7v3ncybdo2Hy9ebKvqNGrn03Nj1+x0Bi1dHHVV9W0U+ye4d2d83+Ca2GJrlGZx0gkppkkfrsysqclFFvh8++3v7CWDh6ugIohfSPcPH+w6fwu05ABoSby9yb3Kc/mePYXc9TdCqslWapVGdn1Zjxo++O33Fujtx4gdEzj61f8xyC8/jN2rsVOcxYZOoVSZtBewZOAT+NonuAWw3S728wFZpFm975cekGjlz8NXLVtSo0SxPImGdtFfFq5epr21wdOxrnMwuaC2jrRJWfYHdxRfIFeDWr0unkyrSUqxcyk2TLQzQrt6hqydPvidDBg/8VTAp8DegvYa3OU1z+SbuM6dQI62kioAAVgondwAnncWvzCDNCk4CLO9vsJVw8xqN+iPiTB5SaTSKURGSaoTHHgxoAMlduL1HiFMZXP8BsvkbO1GD2O3GpLOIF0KsSBijxmCrMY+FqgGJQDzQgGT3XrJ7DuI5EKZd4iDG+CHG84m8AIki1Ai2imRsx4FEBtQHCUB8MG1wi8QKGhjEC4mbAVHTx8kNYSuoiGurkRtLN76ivb0K6SIkusCEoBEgaCQYPyT2QhKpAXKHTiMmQ2lmChWZTrw32v9TsLOyVlu8Nhi2G4Vs32HsTC9IA2KPRuU2Erp097+O5RRYvz3H1r3JldivfY7IR0+mfOu7l3pV5EM1cq744mi+OPwaRD71tSk0Vsp3/uLB6s2minyrIpeOf7a00fFMf1w+MqRGzqvIW/teecdqV5a5P/8ncXv9ZxUdf/lCae5/3/hvpi4OjajIp4ikVOTLY+cXr3Tq/QPcssKNXib9yAAAAABJRU5ErkJggg==") left center no-repeat}ul li.zip,ul li.tar,ul li.gz,ul li.rar{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAEUSURBVCjPXdFNSsMAEIbh0Su4teAdIgEvJB5C14K4UexCEFQEKfivtKIIIlYQdKPiDUTRKtb0x6ZJ+volraEJ3+zmycwkMczGzTE3lwkbxeLE5XTqQfTIjhIm6bCy9E/icoOoyR4v7PLDN+8ibxQHxGzE3JBfHrgUalDnQ6BNk1WRFPjs66kDNTxqg0Uh5qYg4IkrjrS9pTWfmvKaBaGaNU4EY+Lpkq88eKZKmTAhbd3i5UFZg0+TzV1d1FZy4FCpJCAQ8DUnA86ZpciiXjbQhK7aObDOGnNsUkra/WRAiQXdvSwWpBkGvQpnbHHMRvqRlCgBqkm/dd2745YbtofafsOcPiiMTc1fzNzHma4O/XLHCtgfTLBbxm6KrMIAAAAASUVORK5CYII=") left center no-repeat}ul li.db,ul li.sqlite{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAEYSURBVBgZBcHPio5hGAfg6/2+R980k6wmJgsJ5U/ZOAqbSc2GnXOwUg7BESgLUeIQ1GSjLFnMwsKGGg1qxJRmPM97/1zXFAAAAEADdlfZzr26miup2svnelq7d2aYgt3rebl585wN6+K3I1/9fJe7O/uIePP2SypJkiRJ0vMhr55FLCA3zgIAOK9uQ4MS361ZOSX+OrTvkgINSjS/HIvhjxNNFGgQsbSmabohKDNoUGLohsls6BaiQIMSs2FYmnXdUsygQYmumy3Nhi6igwalDEOJEjPKP7CA2aFNK8Bkyy3fdNCg7r9/fW3jgpVJbDmy5+PB2IYp4MXFelQ7izPrhkPHB+P5/PjhD5gCgCenx+VR/dODEwD+A3T7nqbxwf1HAAAAAElFTkSuQmCC") left center no-repeat}ul li.map{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAK2SURBVBgZBcHLjxN1AADg79eZttvddttll+WxIGrAV4QYTbxoYsSLgjc5arx68qCGf8G7J+NBEg8e9GqURDEmEiOJAWNUwIi8sryWDbSdmc60Mx2/Lxw78caZ1fXVo1EUAYAAACAIgICymrt/7/6P8er66tHPPzklNIJyPgNAENRqAWSzBEFdN9TzWq3y0ckPj8ZRFKmUwuxL6fcXrJzJbJ18xFKv6/LlX1xMP3Nra6jXW3Z3eyiKm0Zp7t1jtWYcaQAMh9uGT7eMkkR2+m9JcluSJEJxQTEZm2Rj00liMkmUeSqEOYI4APr9ndQzi+/v4OPz2m+tWd+zV2d2xaQ8pDfoaUUNcbMlyXIhFAgaQDAcDiXJ2MP1ymilNPn6X6q5OvvZrEhk49SsyBR5alpkQqhBDNDvr1PPDPrLhu89Y+XTbeUre7TXCo9MtzW7+y22I81W0zibYkSgQQB5XkiTzHA0NF6qPHiC/Iv/1FWuMf1WPklMi1SeJubTVABBHACdzkB3OdVfXgbNtx/V+eCsuDpg7+pf8s7ERvcP7daW6eSaqPGOgDgAxsNUkhRI/bZ5x41Zw66DlSdPXbZ5PLUr+kYx+slg8Yj2uW1hNRPQEIKA5cFuFgZ+z0rXpk2DwU53XjtgX7xisrXXoDuycX1B54dLbrQqdbMFYqjr2rmbV13YvKTb7cnzXJKkkqLw61MNh7+6Ijl/3eZK0+3nHzdqBvtbbRAHZGVqq5ppt7qWOn15MdVd6Or/ed2+W5lWkwfPHnbzsZZ2e8HStKCuQUwQQkPPsknItKuOxdC16+I9rc2Jqy8dURxMvHz2oX/27xa1m5irZqWAuCwrVVXZ2PGcjVUCCMIhvMpaCCC8OPdCNBMttESNSDWvlFUlvHni+Hc719dej5oxggAIAAAIAIGyrGzd3Tr9P5JrNp8Zt4rCAAAAAElFTkSuQmCC") left center no-repeat}ul li span{color:#aaa;font-size:.75em;line-height:1em}</style></head><?php


// display a title on the top of the listing
print "<h1>" . str_replace( '/', ' <span>/</span> ', title() ) . "</h1>";


// if the array isn't empty
if ( !empty( $files ) ) {

    // open list
    print "<ul>";

    // loop through the files
    foreach ( $files as $file ) {

        // exclude certain files
        if ( !in_array( $file, $exclude ) ) {

            // show the file
            print '<a href="./' . $file . '"><li class="' . ext( $file ) . '">' . $file . ( !is_dir( $file ) ? ' <span>' . human_filesize( $file ) . '</span>' : '' ) . '</li></a>';

        }
    }

    // close list
    print "</ul>";

} else {
    print "<p>This folder contains no files.</p>";
}

