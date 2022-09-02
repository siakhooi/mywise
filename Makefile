build:
	podman build -t mywise:latest .
run:
	podman run --rm -p 8080:80 --name m2 mywise:latest
stop:
	podman stop m2

exec:
	podman exec -it m2 /bin/bash

download:
	podman cp m2:/site-files .
	ls -R site-files
