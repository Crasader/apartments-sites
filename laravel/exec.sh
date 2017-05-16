
# 2017-05-16-14-19_23: ShellAddSupervisor

sudo apt-get install supervisor
rm /etc/supervisor/conf.d/laravel-worker.conf
sudo ln -s /home/amcllc/amcapartments_com/mkt-git/laravel/extras/supervisor/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

sudo supervisorctl reread

sudo supervisorctl update

sudo supervisorctl start laravel-worker:*

