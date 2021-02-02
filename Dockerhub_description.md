# MyWISE
* My Wiki Inside Site Engine, a wiki oriented web framework.

## License
* LGPL-3.0

## Features
* Wiki language to design website
* Small foot print
* No database required
* Customizable
* Extensible
* Easy to Deploy

## URL
* MyWISE at Github (Migrated in 2021) [https://github.com/siakhooi/mywise](https://github.com/siakhooi/mywise)

## Current Situation
* The project was previously hosted in [https://sourceforge.net/projects/mywise/](https://sourceforge.net/projects/mywise/) and was abandoned since 2010.
* Currently it is revised to enable some old sites that run on this framework.
* Many overhauls in progress.

# Usage - Demo
```
docker run siakhooi/mywise:latest
```
# Usage - Local
## Download Site Files for Modification
```
docker run -d -p 80:80 --name <container_name> mywise:latest
docker cp <container_name>:/site-files .
````
