# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=666"]
    
	$script = <<-SCRIPT
	# SET PHP always_populate_raw_post_data To -1 to avoid a warning
	sudo sed -i 's/.*always_populate_raw_post_data.*/always_populate_raw_post_data = -1/' /etc/php5/apache2/php.ini
	SCRIPT

	config.vm.provision "shell", inline: $script
    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

end