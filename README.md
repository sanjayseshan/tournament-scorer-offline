# tournament-scorer-offline

This is an offline scoring system for FLL tournaments. This assumes all the scoring devices do have a network connection to a central server though.

To run on Windows (64bit and win7+), unzip the attached file in Releases tab and run start_server.bat. Go to localhost/, or the server's ip address in a browser. Follow the instructions onscreen. There may be some warnings but these can be ignored as it is only due to difference when using NTFS versus EXT4, which the server was written for.

To run on Linux, clone this git repository, install php (e.g. sudo apt-get install php), and run "php -S 0.0.0.0:8000" in the cloned repository. Go to localhost/, or the server's ip address in a browser. Follow the instructions onscreen. 

For Mac OS X, you should be able follow the same/similar instructions as Linux, but you will have to figure out how to install PHP, as we have not tested it on this platform.
