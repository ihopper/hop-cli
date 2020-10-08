
echo "
rdr pass inet proto tcp from any to any port 80 -> 127.0.0.1 port 8080
rdr pass inet proto tcp from any to any port 443 -> 127.0.0.1 port 8443
" | sudo pfctl -ef -

docker pull registry.sweetwater.com/apache
docker stop sweetwater.dev
docker rm sweetwater.dev
docker run -h www.sweetwater.dev --restart=always -d -p 81:8080 -v ~/Sites/sweetwater.com/:/var/www -v ~/Sites/sweetcare/:/var/sweetcare -v ~/.conf:/.conf -v ~/Sites/logs/sweetwater.com/local:/var/log/local -v ~/Sites/logs/sweetwater.com:/var/log/apache2 -v ~/Sites/tmp/sweetwater.com:/tmp --env DEV_EMAIL=dylan_baine@sweetwater.com --name sweetwater.dev registry.sweetwater.com/apache

brew services restart httpd24
sudo apachectl restart
