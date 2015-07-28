Godfather Rock Robot
====================
by Vincent Menard (thabob@gmail.com)

The project is fork of initial project from Shawn Crigger
https://github.com/svizion/Godfather

Godfather is a strategy game made by Kabam and now distributed by Rock You. Usage of bot is tolerated, as long as you do not abuse. Keep in mind that misusage of this program can get your account banned from Kabam, if you set the refresh timer to fast, to the game server can be enormous and you will get noticed, USE IT AT YOUR OWN RISK.
This version enable options of attacking gangs and MI using multiples hood with fixed time intervals (see attackCtlLvl10.php). It also provide automatic troop training and first neighbourhood automatic reinforcement from all hoods (see trainallCtrl.php).

The project now use web controllers that refresh on timers in order to visits all hood and execute tasks. Those controllers display iframe that open specific tasks. That require that the previously trained troops are written into cache files so that when the controller comes back to the hood, it remembers what troop it started to train 90 minutes and can send them.

[ Configuration ]

- Troop training

1. If you want to use the automatic training program, you must configure trainConfig-90m.php.
The numbers represent the amount of troop you can train for all troop types and all hoods in 90min (1h 30).

2. Configure your user id, wgangsta hash and realm in all files. (trainThugs.php ... and all the others )

3. Make sure your FN coords are configured correctly. (RIall.php).

You dont have to configure all troop type for all hood at start, you can choose one troop and fewer hoods, as long as you alter the train ctl properly.

- Gang farming

1. Make sure you configured the troops you wich to send depending on the gang lvl or MI you are using.

2. Configure the hoods coords.

3. You must adjust the speed the refresh rate to make sure the troops are back before launching again. My fastest is 22 minutes for 8 hoods. 

4. Configure MI coords are configured (if needed). Gang coords are fetched automatically.

[ Install ]

Once you installed xampp or wamp, you can start everything calling the controller file in a browser this way: http://127.0.0.1/trainallCtrl.php?hood=1

You browser window will refresh on fixed intervals (90m / 8 hoods with my setups).

If you are having problems, make sure your apache can execute curl and can write the cache files in the webroot.

[ Notices ]

- Note that hood number of chinatown and atlantic are inversed compared to in game interface.

- Same with the troops number BlackWidow / Butcher.

- My L10 gang farm controller is actually launching MI 1 attacks (lazy me).


Have fun! Its a wicked game.