<?php
    require "header.php"
?>
 
    <body style= "margin: 0px;">
        <?php
            if(isset($_SESSION['user'])){
                echo '        <div class= "container" style="display-block; margin: auto; background-color: #7ab0ff;">
                    <a href="indexuser.php"> Your Licenses </a></div>';
            }
            else{
                echo '<div class= "container" style="display-block; margin: auto; background-color: #7ab0ff; margin-top: 0px;">
                <h2>Introduction</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel libero eu ex tempus ultricies. Etiam auctor finibus ex, quis viverra magna semper eu. In hac habitasse platea dictumst. Morbi a consectetur mauris. Ut consectetur dignissim sapien vitae tristique. Curabitur pharetra augue quis magna facilisis commodo. Morbi accumsan aliquam quam, et dictum mauris pellentesque ut. Donec varius hendrerit cursus.
</p><p>
                Proin faucibus scelerisque justo. Nunc pellentesque, purus non viverra placerat, risus eros porttitor nibh, id maximus mauris ex nec purus. Nullam eleifend pulvinar velit, vel vestibulum enim porttitor id. Morbi lacus mi, finibus non ornare sit amet, gravida commodo nisl. Aenean sit amet interdum lacus. Quisque cursus odio sed arcu tristique rhoncus. Maecenas pharetra molestie arcu, non mattis velit vehicula et. Nullam quis elementum mi. Duis tempor justo fermentum, condimentum augue vel, tempor tortor. Suspendisse rhoncus dapibus facilisis. Nam orci lectus, rutrum tempor augue nec, porta semper neque. In id libero lacus. In porta rutrum lorem ac blandit.
                </p><p>
                Quisque cursus sagittis nibh eget rhoncus. Cras a neque interdum, facilisis libero ut, aliquam magna. Vestibulum eu tempor sapien, vel efficitur velit. Etiam vehicula eros dui, vitae pretium nulla volutpat id. Maecenas id diam vestibulum, consequat ligula nec, mollis risus. Aenean facilisis tortor at malesuada tincidunt. Ut placerat faucibus dolor in facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam neque ligula, condimentum eu enim ac, efficitur ultrices orci. Aenean imperdiet libero pulvinar ornare ornare. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce magna lorem, tempus id ante id, semper consectetur tortor. Nunc sit amet massa at libero maximus faucibus et sit amet elit. Mauris sit amet feugiat elit. Aenean laoreet ultrices arcu, eget scelerisque libero mollis eget.
                </p><p>
                Curabitur faucibus eros id massa convallis, nec pulvinar nunc luctus. Morbi vestibulum lectus vitae libero blandit condimentum. Nam tempus nec libero a vestibulum. Sed nibh ante, lobortis sit amet nulla ac, tincidunt imperdiet dolor. Vivamus egestas finibus felis, vel consequat nibh hendrerit ut. Proin sed ligula imperdiet, varius mi a, imperdiet arcu. Praesent ut nisi et nunc tincidunt dapibus quis et risus. In quis massa in massa bibendum tempus. Vivamus quis ultrices ligula. Pellentesque bibendum sodales nisl, a ornare ante dapibus consectetur. Donec porta, sapien eu congue varius, massa tellus dictum nulla, at ultricies enim quam et quam. Ut ex turpis, interdum a rutrum id, lobortis ac massa. Aliquam eget facilisis lacus, at iaculis lacus. Curabitur tempor bibendum quam, eget ultricies metus molestie a. Nunc id scelerisque diam, vitae semper ligula. Proin facilisis vel odio scelerisque tempor.
                </p><p>
                Aliquam erat volutpat. Pellentesque feugiat sollicitudin libero, in varius diam dignissim sit amet. Integer et felis aliquam, porttitor massa ut, tincidunt nisl. Nulla sit amet nisl et nunc elementum condimentum non eu nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare dui non interdum ultricies. Aliquam sem nisi, ultrices sed egestas non, malesuada consequat nisi. Phasellus a suscipit turpis. Mauris et eros et nisl mattis fringilla. Donec non elementum diam. Phasellus fermentum, lectus at viverra rhoncus, nibh ipsum imperdiet dui, blandit elementum dolor turpis non sapien. Nullam gravida aliquet malesuada. Suspendisse in velit at risus hendrerit semper. Mauris non eros vitae enim pellentesque rutrum nec eget lorem. Ut eu eros non massa bibendum venenatis. Sed hendrerit sapien vitae odio elementum eleifend.
                </p>
                </div>';
            }

        ?>



        </body>


<?php
     require "footer.html"
?>