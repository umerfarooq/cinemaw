set :application, "Cinema World Asia"
set :repository,  "https://github.com/umerfarooq/cinemaw.git"
set :scm, :git
set :use_sudo, false
set :branch, 'master'
# default_run_options[:pty] = true
# ssh_options[:forward_agent] = true

set :deploy_via, :remote_cache
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules"]
#set :ssh_options, {:forward_agent => true}
# set ssh_options[:port] = 60022

task :staging do
  set :deploy_to, "/home/umerf/www/cinemaworld"
  set :location, "100.42.56.12"
  role :web, location                         # Your HTTP server, Apache/etc
  role :app, location                          # This may be the same as your `Web` server
  role :db,  location, :primary => true
  #  server "www.divebar.bitbytez.com", :app
  set :user, "umerf"
  set :password, Capistrano::CLI.password_prompt("#{fetch(:user, "server_user")} password: ")
end

task :production do
  set :ssh_options, {:port => 60022}
  set :deploy_to, "/home/cinemaworld/public_html"
  set :location, "cinemaworld.asia"
  role :web, location                         # Your HTTP server, Apache/etc
  role :app, location                          # This may be the same as your `Web` server
  role :db,  location, :primary => true
  #  server "www.divebar.bitbytez.com", :app
  set :user, "cinemaworld"
  set :password, Capistrano::CLI.password_prompt("#{fetch(:user, "server_user")} password: ")
end

desc "Symlink shared configs and folders on each release."
task :symlink_shared do
   # run "ln -nfs #{shared_path}/wp-config.php #{release_path}/wp-config.php"
  # run "ln -nfs #{shared_path}/.htaccess #{release_path}/.htaccess"
  run "ln -nfs #{shared_path}/uploads #{release_path}/wp-content/uploads"
end
after :deploy, "symlink_shared"
after :deploy, 'deploy:cleanup'

after "deploy:finalize_update" do
  run "chmod -R 755 #{release_path}"
end