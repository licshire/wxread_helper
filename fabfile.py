# encoding: utf-8

from fabric.api import local,cd,run,env

env.hosts=['root@ec2-52-192-150-1.ap-northeast-1.compute.amazonaws.com:22',] #ssh要用到的参数
env.password = '364416072'
# env.shell = "/bin/sh -c"

def setting_ci():
    local('echo "add and commit settings in local"')
    #刚才的操作换到这里，你懂的

def update():
    run('rm -rf /home/wwwroot/wxread_helper')
    with cd('/home/wwwroot/'):
        run('git clone git@github.com:no13bus/wxread_helper.git')
        run('chown -R www:www /home/wwwroot/wxread_helper')
        run('chmod -R 775 /home/wwwroot/wxread_helper')
    with cd('/home/wwwroot/wxread_helper/'):
        run('composer install')

    # with cd('/home/wwwroot/wxread_helper/'):
    #     run('git pull')
    # print "remote update"
    # with cd('~/tmp'):   #cd用于进入某个目录
        # run('uname -s')  #远程操作用run