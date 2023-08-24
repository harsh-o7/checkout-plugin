<?php

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
);
$products = get_posts($args);

$categories = get_terms( ['taxonomy' => 'product_cat'] );

?>
<div id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 navigation">
                <div class="logo-cont">
                    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/main-logo.svg'; ?>" alt=""
                         id="logo">
                </div>
                <ul class="nav nav-tabs nav-justified admin-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-payments'); ?>"">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-design'); ?>"">Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php menu_page_url('mcheckout-upsells'); ?>"">Upsells</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-discounts'); ?>"">Discounts</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content py-3 col-md-10">
                <form id="new-upsell" method="POST" action="<?php echo admin_url('admin.php'); ?>">
                    <div class="row first-row">
                        <div class="col-md-6">
                            <div class="page-title">
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Upsells</h5>
                                <h2><button type="button" class="button-back"><i class="fa-regular fa-angle-left"></i></button> Upsells     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect width="24" height="24" fill="url(#pattern0)"/>
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_2857_29450" transform="scale(0.00416667)"/>
                                            </pattern>
                                            <image id="image0_2857_29450" width="240" height="240" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAADwCAMAAAAJixmgAAAC91BMVEUAAADe5+/d6PDe6fDd6PDg6PDg4+7Y5fHg6fDY6fDg6PDc6PDg6fDf6fDc6PDh6fDd6O/e6PDh6PDd6PDg6PDd6PDf6e/f6e/g6PDg6PDY4PDY5OzY5+/q8vbY5PTY6OzY6PDg6PDY6PDg6PDY6PDo8PjY6PDg6PDg6PDc6PDg6fDh6fDc6PDb6fHc6O7g6PDc6PDe6PDg6PDc6PDe6PDd6PDd6PDg6PDg6PDg6fDh6fHc6PDh6fDg6PDc6PDc6PDg4PDg6PDd6PDd6PDg4PPg6PDg6PDg8PDf6e+42OjI8PTBqLjfYWfgU1jInKqo2OqwwNDLj5rmSFDImKD4ICD4GBjoRUi4wNCw2Oiw0OCw4PC4usjYcHjAuMDwOEDQgIjoPkDOgJDwWGDosLDQ8PbAyNCo4/PQiJDI2uTI2uXI2OTI2OjI2OCzytm0ytq0zNq4yNiyyNiyyti0y9qwyNjA0ODA2ODe6e/e6PDd6O/g6PDQ4Oi40NjY4OjY4PC40ODY6PDI4OjH2uW0zNiw0Niw2PC0yNi0yti4yNC4zNzgWGDCp7C44u/A2OjA4OjoiIjwODj4EBDYaHDAsMDgnKP0cnPwaGnguLjwYGDgsLjwWFjg6OjooKDwGCDwICjwGBjwICDwKCjxKSrwKCvwKDDocHDgyNDoeHjwMDDwEBDwQEDokJDZ8PDgwMjA5PDUoKjwUFjQ1NzP6PDQeIDQkKDQ2OjYcHD4GBDYeIDYkJjY4ODc6PDg8PDY+Pjg8PjY8Pjg0NDY+P/g2ODwQEjomJjg4OjfqLDg0NjwSFDY///g6vDc6O7c7PLc8PTd5+/d6e/gqKjogIjg2NjxUFDg4ODg+PjgwMDoaGzgyMjocHjwYGjgsLDguMDwMDjoiJDwEBjwSEjokJjg7PDg8PTg+P/kUFDoYGjoeIDogIDomKDooqjw9Pjw9vjw9vrv9fnw+Pjw8Pjo8Pjo8PDwKizxJCb4GCD4WFj9e3v/gID4YGD4SEj/iIT4aGjlN0uKAAAASHRSTlMAELAgqKAYCLAYUOBYYOho6HAIgPB4wLiQiNjoUAiIWMjAMOBYWODQQNDYSNhIuOhooBigmPjwgHjIOMgwKLjAMPiQiEiouIDt3pO4AAAaZElEQVR4AezWZWLrIADAcZrM08zd3V3SucuVBp96LzjBs4tECDnBgxCrp51Zf3Mp8I+Dpo/Q1NTUH8lInftcG/+mH7yJ9nY50z6nShe+c/5+fX09z51zp9JqqY3V1DaE1a2uLaGrqyubzercLtfXNzQ0MHA3dnt7eHhwcHh7N6RvnasZ0LDMvnohli1mDWbq6es7zuXu7m45PgvXwincJXfF3wNnwlolm2upbQris6BJ3T6DOzrCApSM3s0z5bZvQ50C9VJPu3oGDg8UHnAmJhWTiOGP8CvJp4FqCv4tn8w+0jpyG/Xs5/5zfVQ50wzowxHUOJKK1xjiQ1zYjPHmQTZtcpt+cNYNJbEjkJBYDUtw06Jvz3WZJ3Y1DGit5yCFjH6phbWilfDAaMGOQxtjJ1lVmA2wfP7ILiOJ5Nls7VN5VYl2rogNS4NlOp+cJXY0wWExXuirtXv7tDiXuSalpm06X4pNqYei4uWe6r3Tg9HBzCivdb4imzJZLCxMVusdNcJe4oraL8qW+1g6uwCVtOeM32Evpc4XZtM42BgDlczElytX9n7lXQwDePMUlKfOYighj1pfPJhgGDqqtIvHDBgHO1+WaUfXaQnPXoByzsfjfyEu/exZjs8S7BCVXEYwhpF/3Too58mI/+WfJx41LFMOlwZ9VyUPfW6AMeYR+XiZcAjK6LyCsX+IMDca7COwyrwEEkAJWO7ehEsVlOrSYALGCJFwPPR55QVcAJZaWwWlcgYsgHHeHxB/RrA+mg5KtHfA78sYyIBiF2fwBZ7R8wf8d3qtnaDYxuZLcn0wnV9IeMb1/DfG8EUUFRTTNfifVLI4VyAIwuAzOz8ywd3SwenulX/WTmxQZEAYRLJ2Q/sb6jxWXWPJETCOyAJnpYERcQygcgAWxepXI0+Gbxf819r2fQ0XSAKVr3DBUuWApFqtNdYLv89bviUIAz4QpewoXuVhwTuideGgmKXnVKu31WprBv23C+qNlnXgJe8ph4MQimQxExUO4rqqWVJOev9DwFL488+35ASHN5Sz0kRDlCsUsECx2nC5OuPOrhXcZqIwDP8MYbyPMDNdyNZh1gm5S7fMhjlHSxoFe41GhjAzM1G7JDvMYHlhvDj+WuPj16x1H8+dCwxnpJTiDOQDXuUMEnjPN3CoV+ANXT88ID1xNJkMC3lGHbxwVZ8Lr1MEQ+/BuQqD8I4eu3n4xOXaeweEhNOKb1p/6gYGIWqKkHPGOLdeXEl0L54fBP+hF9g5I15ZHIliRMR40XEXHLXCeoEd8G5bnNqQGimGhLz2igQ18F96FfYuXeYUI7sjnb5cioRsnxSOCniaVmBHiH0MY1a60/+4KhuJ2XHXUAJPnakRGLxmmxF1+H7nx/lVdxEx4sEgg9cMHliI55zQ7vzk/SS+jIgvxNluwAsD4Bl9Bq8dNDBcvWYxwoz/DdyBMdYEElR+PAw+OJQ3WISrORHaX8G+n0HqAbwwAF6mDxjc24hkovXmtf+J+/oNtbXhxbPdPKUX5QDP0gYsw5c5maaJpW/8T0tbSEjHEqAEXq4NGLyX92Pmp6GVSafTGUIi9uC4pwSeMFEXMMikzcj8vDZEQqQGQnwohVGg4P0XOZlfRx9nmg3ELie900p/4ukDdm9YaP46QqxMgBr4X03AjhDXuZkNZrVhCYYaeLImhd06xGwwNtYkHKObOf/pCgYZrmfBwE1CgCp4/DgtwIlINBi4tNkF5SMPgw7ekwcYvGQqR+ASVzhGd3P+6lfwli/gvQMOdoRbwmLZYJZKej1dVQ7wWB3A7o3SaLY3xiIuGAUJBiluBgPz+rDo8ZqmT9MR7CRqcn3nqHMNIw/w6GEPBi9cyygQ+LoQhQpOXCCk7MDWjV4EnjkjB3hkvuDQN/DOAQWDl7wcCEz84n7IDzxqZB8Kb+o9OJQv+LE8gtmBG5l9yTMKFHw1nsoO3IDsA3dnFd02tvXxy8zMzMzMRKUBu5WKw/MQrCM70lbs5K50kqFO08FiLBXjNB1mHUlJ+ctt19c2SZkvtX0ber9H9kmsem9nZMf1yPNb8zQr6crvbNE5+p+tHQwCCeMUzxdCLszYgbRRKJwZ2eloQYR/V3PCibFDPekN6Ja0y4WqC0PAixYSTpUifBfcl8FXrPtXO1q5wm+jhFUSLCwqnLxcwl3Kgw+YhQXekO57YAwqKTwMQWCQF2bDw94v4WHBw1OSsCLHVywvKPALZua/bJ9WtvAnkDCAXleIjknpvnOYZnwULCsv3FWKsCw9HjEKhdP9R1wImLX8PS2MM2ENWRSKZk5bjhZBe5yTSCTq6+vHxyaZTKX8W0SfB5+wygkmPGf2UwW+4pVw+cJv+0ZhfblvLCccwywWKJyuFoEyzvgQLeFD0t6eGwdvEP7OhyB/DjPg+OPYrTnUQmFZWhQ10TR4z25X08oWRuFS0BcvbimVJk4jZ2KUFIz40c62uHcgjB8GuZ3Crfmdt7njIScsLeiJogIba8bwIRI8PoyF65XulgrCB6K7u5uPQQs6HryjQBwG4mwQJDv0pphX4CeXm3hldnQMXz/VYsLvezlhFQlXnkY+Bh4KjXc6ZC8P0h3ELMl86ME6PjiXogOUJSxOn1hL1REnBaepsaurS+n0zmD59qfQwl10uiwrmHgSSOEPYuGvFAirEFdijTmaKFqqxdyrI2hlNtI3bW6Xb4wEneiBNbiwda4joQRjwr1LUWKxbkF2nKauq8jNV0XRwt1L8yW5i/zxunKFNQvUggeP+jyJHPEst417tXEUkhiHX7m9QShReMnca9EtyYwsXHCL0kJBp5Lf815C+KtEEpoBxn/XhFYA37OTntIF2dERA8KvwNlxEA8wnS2C2OLsGEw+CIo0b2EEFTiy6Ba5syThN9PC2Lk4rYJz+afjDuZ/kuAjkttJlUoldY8n+Cgk4u0Tf6kYBHwoiOuGN4iyNB8X+KXZc6RmcpS68SEdXBgTfP4jRgQEvlEQS36cutyBkEiMHwacZvGcNsHcaX34XZJx5U1KLEt3d4MfhQ86LfwaxM/KFQ4+pbf4KJyDhNKYPaBbks/7N9Slkkk9yxPidMiOw1/l6fihMjrDf0vy6Tbg25IQ/k71hQWQF9ZBUzliMkXRAX+baeICmyv/puep86F3gBpW4WKr2KoqRoEDY8/OIFZmjzIGxdC0EAszbXL+AUP3GuihMn1y0AGVRkMI4XfWhrC7ew9R4FM2aBXYXfqLsoVTl0kYmLuMKPCZUUerJeHW4BW2j/Sn16Ol9zU21JJwayufdgYSBsY2p3sLhb23wVp4hIdfXhjywpMPD9heKJp4GwxlCL+DEP751IWhgsLgrD5MLL1vxAWuojDaTVhJ4bHjJn5Z2LfVhQoJ/3IKFS5PuG7S3bfO6KoMXno/wJhWjvDbKimcLEVYhbpAwnvdC2m09H66X6zMvvqEwRncnkEvC9NnB5j16hTey5ZlzPWF+ZWHtzlaxSr8+rKF9VKELS4cQ5u+Ec4R4pbUe3GsvAJr3/hERYWD7fkWjAs3YmF/gY9mCutrnj620wGt9oT1AMLuCeIhuk88c1RK+NfhEXbgusICr+9Nb2asbOGvh0O4VaOxL6aNwiM63bPVtrRyhf9weYRbSxJOtBYRdkbP4CtWepnLyhX+f0r4e5UQbq2EMNinMiYORe+2QQuZsDAInESifxzswZPEyuyOcn1FA7EQCMfpc5jZm/EsKf3wTqfGhVuKCIN9wiQK/JAocOWEX1sBYQgk3DYhTDiAw3Ao2ozevtQNi7AKenOsgsL2fgMX2LzjTlDDI6wI4fpAwsnJbtvgjo4QBZ4vLa288K+qLtyBhC2wtxhGoXCkZ54Ur2Hh9kmE7UG+MosKvGiuMkXhn10mYVWb0l48i7Hz6KHSjM6+VVYqX+E3/6nawu1IGIYO9aACG5Gr5ypKAhgEQA1e4fKF/640lCl8DobBjwMb0+YLBQVefrssd/HDgZO6hGQSB10B6O5SlPDryhWuaxDCdb4OT75gBPhg7HnwVRgg55HM/fE37NqApsER8w7Jy8u0X0obRXN7fQcEFn4LITNBawHg44mccJOiP+8PSgpawaele3BhEbbMhR3En680S80zcJ5j+d2SnE1EBSMOakDh92Fh8EGqdmSpH69wfUoXiASLSPJ4iLIoHBS2FMjSlXifTrRngbSkJTAxRQdaGPMWC734rUvEE4I4hfBo8cW0liiTkc2h+GKGl2QOpTlXRQvXOfgtyStwcOjHvZ//ghImbpgB8MWlOxVOt49GOoRF0umFoolb0pzgvmJSHlT4DfjFfndTS9VYIi1YSISir5RKFK4HLaDwH6uapsUFlueLlL+Pp2Y0l+TbqCjJ4MJVzUvjAk/ri+Jb0szxAncqwdBBK7fCdZdF2J+wbfBtEpDl6cvXk6HoFo7/PhyfhPokqIGF34jbwpaj05jFtzdE7ATJk0+FeqF3IXHnQ1RA6cSjS8Z70wb8jhr2DSqsDtcrweii7qteDlAgtERpEon2zvEcKL9vJ/kzIlcYGH04g/Mr59mjEyt+wLAcJnDDNCysDUNdu9JWnPxTXqfQbV96F2ept3GJ49vWlUxyL1GafPYw+2QmGFuT7kVL7/2b/qUrMbTEWQak8A8K52rDkNKLwQUEHals35IuRZYehdHR0dXOmMMAc+4cAAx7/9VPCMPEQtbBfiK/ssVxLqvwD/G8IAAM6rlwsyzJ99x734pV1913auXomFP8+FIpYfsAsTI7ss2GqgkHB4BXmPvec3ePkfYw+lZdBBt1t8LCDTpY4205+wxiI5YNl1X4I+ULK5J8c080apjmOtM0uPPhg8gYCTeMC1uOu5FqkQVOSIXjiiw/ZkRNruuxfr1pZEY2UcZCuKEhJ1wnhMkWWebKIbBCKswf+43IOt9KBTc+M2hbRSucExYhj+Itsioo/PrKCQ9DfNbMDdHCaV1mz0EbioU8hHB9TtimWmT1HfF+PZzCd17xb7wvwcyMjPqN8ZJQQ0NWGGyyRdYBG7RwCkPHnXihImt83U7K2AK9QJhqkdV/8PILf7RMYffGq3iBMb2Z+8EGWjgf8gB7U4+BW2SJt8EhFLbOuc+gAotn4dMbGWHMhWMTwhZzNhMFHgEnrMKas3sPWjufyGX8l7kwaYwH7AeojVjHbUurpPCvXk9/Qqx0rL3OWbrAIomCjX0SAC7cT7fICquw5g6eydC+YgIw4EBxYWZTLbI2bLVBC5+wKPAWkfKlSRs7WIEx8wmPjT5M7NM5PwBaSIXBHew/7U/5YmNzzQADWjjO6BZZg64WVmE2cOo0mrgXRiT3u3stWpifD8Q+nR0uVFz4rZURBmfTQnRIoth+33HXP5FgE5mQpQPL0qjA/AnN0aoi/JPShRlDE3fKuOeEMBbCbTHRQWlrT9qkWmSFVRicIydRgSnj/q22T0IIK/LSo8vNFwpvScdWO1pohdl/UYFp4+2DNhKWpZnUPh1+NIRVGMa29qFbkmmSxmKy6I/xyMrty9ejHxSh6AoLv+57hPB7SxVmbCPO6RtrewllMVn0x3iot8EvpHuOOKCFVdg+RDwljRwV/5OeLPqE58yOEqFoxkIrjLvTZ7vxD/DgkUkd1cfAhnyqhWyRdfrMoGtpVRN+V4kFfsAw8Fry6P/t3EgZr+/NbGQuTAhL86gWWRdsVj3hd5cmzNiKDJ7XrRkCd3QFZSwmi0JYluYTLbJWjbqgXRbh105d2D5OFHjVThcs++Cq08Z6yvjAgAs5YWmaGSkQFt+XCakwOLAqbaIC7x+yLAvswZHT5gvkZJE5AB3t3tvgp3CB71/thld46F6iwNet5gW2eDeKwTOnqUs1nywOOJ7w3KsNYmX2xJClVVH4nUhYhaI4O0dwgXuv/xdkYf86IjoFE5NFJxWnWmShjVhVF7YAOpL5F7w+UsmOG3iBkc1/BgY6skDH0Nb+KPXIxSeLDovPuhnfkoz+wTH4SxZ1Ap/w8HDlhfGnr9vaSdqkG2enTSKnHx8n8aDIqGDj43+bS7TIMtJbbECw/J4fCEYwYdFRG230Lcqsa3GBL23LJ8+dSRtHe6bd9HQUp/xn33jXeOyvfpy6ukSLiDXG9SCkAEoWRlF9RFOzNG/2S7jA0yQl/zNdsnS1Gd1AGC+/6mZi6T3CW2T58VqLef3UfAmsALQlOiCw8Be/ZAWLLXGXRXhpVqRe/T91pUEaG3hGZWZbZDU1jiP6gvmFYySocWwc1OAVDhhM65LmXVOYAjUjffdIBT8nSzdHIiZh/CK+YvXeMbelfHCatpxDWieERekei+ACz+cFRsaLkLEAJdDQb5eJKDEtjDpqo3ApXeAFuMBerBknUWX56SgaGoxp8MOj+ZUVFs0MKLhFBMV8n3paknNxyK4s2T6esRhPjAYwNqOPSXJlgrtNKE0bXFiDVH2c4M4FC3GBr5knL2nz7URoVnJIynTCGP32HDkXH+8upNHfuddPEwHvcKy0JcsX1oBiYOA8Cs1lc+teHDKVzKLn+dsj/3k5497olXO9oVpCpel9XWCD0KYHvy19HQlrqgrDl/IXGOOLyS8QBVbohyE2dvA6vKHfj5lZlXw0qWN4v0d9/MGjq93fIxbhS9Nq5QtTQPZTx5cKrzei13pncILK3lkwNDji34xETBqPT2QVmQAEz+sti8X+ecjTioAJtEoLu4f6Cr+3sJ5vTJA6uTB5zxeTxeLGmcPAirR7BKa3xIRwfk7RWhxVCy6M2w9T7IOjGbwUdbN3F6WEhfGRft/0GC29Hyq++RvywsGnh5UUBufQBjRNil41R6I20PiMDy0kYhEi0HWeMS20wvvg/sz6IjtPxN9EG58o8hJqQ6Z/0IVXRvhnWBgX+AG89h799xxJ8VcYYzF7pTj1cYssh1mhFWbsGD6De70CI2FkfNykapwZEV/ECqUw8NgrLvCMZknBwtj4ooGMzbSx34ZXSvgXLyvMYAUusPnQ3EBdLQYGLqwtMDaNzEbmVF84cCdPe1fawDluXQokbO0b2JK+xNjszTx80LW0sAqDAw+fxgW+/oaAfUuADZw1fMamsfzhQZGFCGeFbb7VBhX4GDzarARr8gCMHe/P8PfHWYyocfcjY8i3isK/nFw4u/ZOBPX/pZPCtPHQtmX9RtqIRCJRc8ZM+VHhG05hewdxlT3MHCEcpDONBa69bf+B6TNuv/vaO+RZsg7aKyj8+kmFwSGC68aGEzbozYtpYQoAd2hsqSLLc2+RFSXUwvYWosAbXUe0i6IPaQJQ2V2yLPN9/bEwC4N9sH+tid73bbXBL6wG64NR7+3PrK4wlQD4XvHGlvTHu3nGyGVqGcIJpTH0wvZgP/FCd5MNNSz82uLCFnPPEwU+74IVfmGUxAvQQYz6OruZ7tntglbLwp+1Jlm5E0uz6AMTNSJMBcTf9ycsLLBx1ycz3b/N1Wpb+FdFnznYZlzg02dtqFVhwetK+eBCRnxBpDaEf00Kv6VYgeEoDnSkL9hQrnB99YV/SQn/segnUxbiAoudCbUi/AtK+I30Xry9zhq0kmWsXeNC+IVx45IgXQ/2sQPpXvT+SxS4poU/UkQY/osW34z9NssLx8Iv/DNK+KM/ooXZ+cJ5UmaFKHAtCuOdWvgjIoZhFuR8xwAL19wh/V5aGOyC/VQ8zb/TqWVhlB/G9+GM70HLTJvHbdCwcM3dh98hhHGJj/Tn3/pvMDKbwQm/MHrSCh4BsJizf0Mmlxc0TSOzYpttabUl/Ks3UcI/w8LCeJ+3gp4xentfNDJrN26z4R81JvyGN1PCr//GJBvBBw9sNw3D6LvuIjjCFwtrJQkvDiKsTIRapiL8Ea5X2hoPuGzbyjUXLm5d7TiA+n0GrJeAiRQnCpFhIIX+8XL40Y+5XtD5oQD2OlnwtgReMMUrVxzU4P2ZYtyXPgdwSt3zjXeUJ4w/XRq8hVixHNSwZ6yU8idBRzymeL7DGgL/482KEounQJsCX/smFkZPHsEB0HlmToVSfyPQtg2AJP9RAG0q/BzflYgbcXBUAAZqab/BUYP/46BNiT++huaX+L5Uy6hqwTUL8b6fv6p0AQB/E4++aqmcGtcFrymnuI7++q3FhN8prlqiEWoN6/6PmrvKdhsGAjAsl5kZ3suslBmXIpjngOZIR/K2soTCmuoZWxdjKNffuU+Xkt84Ds0jWpiiowZJY0f3TuwRMUSKHmcunQWMUSZFCjh4XbQ5sUM2nw1vwSb0I2umFxyTiFgarRVgfja81eHX9HfRllobY3Kzm83+48YZcVkMiKk0VYA2wPPokUOi3c6rc74eMJpQs+WNe1Znz//kHSezbm4V/n6MMXisJAuWc3VZ8kFLvihEu70neRV7S8VNM23c6GN0nM3mfdxPas+LmwVCiZklYE1F14zleXRyQHR5fmORV3FmiLKp+ZTlSNx2cYiwlfceB0kNm3EfKS2AYUpn3Ovp+CPfFKLL3tOf6sNWXZwpZSpQ30ZKqeMeZbYFbNH+U7OCUlu/UZZ6BQM20Hl1+XKn6LbzDO9RSMXbKGIGU+v4r3vo38cARke9B5+IPjePUbGj4rECwDDn3osHLos+xXGZi5UeIWM0hnp8+Hz70l7R797bujiiNUaPiFKGajFSbkVevU7rd0jxhIsdJoARNFOnUs35c304nOx6LgYqjl9rVrJHC6aif55hZcP8fpYlHv/nVe2yzn15tBDDXdl15Ft91RRpeKEz3WCwEtXaH5AYDuJDHg2otvqSN/Ydvyd+SHF4x0HZXHnkoS1tu0f407wP62I/14Nal0sp5fd250E5AhgIA3Bytjmsdbb9UMXT99+45vDyLYaLcfJuE5o0OPuxeKK2vh1jy8OT8MkvqG/bKSVXRzo37qRraSZUhCqJSSEIw3BYq9Xq9fpkMp1m040lZ78UbOWH7cVtE/R58wGKnDrwjRAgsRhaiIRJjwxhDwdShDLk8+U8dLvdNKQuLlIJaDQarUbrRprDUlpBUIgDhyiwf1OIrJY3Nw3hxpobZ67lyghaEdLX+CsFjUXZsfM8z/OeAQ6c438VCwT4AAAAAElFTkSuQmCC"/>
                                        </defs>
                                    </svg>
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-6 date-cont" id="upsells-date-cont">
                            <div class="date-ranges specified">
                                <ul>
                                    <li data-range="day">1d</li>
                                    <li data-range="week" class="active">1w</li>
                                    <li data-range="month">1m</li>
                                    <li data-range="three-month">3m</li>
                                    <li data-range="half-year">6m</li>
                                </ul>
                            </div>
                            <div class="datepicker ic-datepicker">
                                <div type="text" name="upsells-daterangepicker" id="upsells-daterangepicker">
                                    <span>Last 7 days</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="upsell-analytic">
                        <div class="row">
                            <div class="col-md-3 us-cr-inner">
                                <div class="analytics-box">
                                    <div class="main-info">
                                        <div class="box-title">
                                            <p>Conversion Rate
                                                <div class="ic-info-box-upsells-conversion-rate">
                                                    <svg class="ic-info-button-upsells-conversion-rate" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_710_19499)">
                                                            <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_710_19499">
                                                                <rect width="12" height="12" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <div class="ic-info-text-upsells-conversion-rate">
                                                        Percentage of sessions that resulted in online store orders out of the total number of sessions.<br><b>Conversion rate = [ converted sessions / all sessions ] * 100.</b> <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <h4>-</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 us-ts-inner">
                                <div class="analytics-box">
                                    <div class="main-info">
                                        <div class="box-title">
                                            <p>Times Shown
                                                <div class="ic-info-box-upsells-times-shown">
                                                    <svg class="ic-info-button-upsells-times-shown" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_710_19499)">
                                                            <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_710_19499">
                                                                <rect width="12" height="12" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <div class="ic-info-text-upsells-times-shown">
                                                        Number of sessions where the upsells were triggered and displayed. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <h4>-</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 us-tp-inner">
                                <div class="analytics-box">
                                    <div class="main-info">
                                        <div class="box-title">
                                            <p>Times Purchased
                                                <div class="ic-info-box-upsells-times-purchased">
                                                    <svg class="ic-info-button-upsells-times-purchased" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_710_19499)">
                                                            <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_710_19499">
                                                                <rect width="12" height="12" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <div class="ic-info-text-upsells-times-purchased">
                                                        Number of sessions where customers put the upsell in their cart and finished the purchase. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <h4>-</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 us-ap-inner">
                                <div class="analytics-box">
                                    <div class="main-info">
                                        <div class="box-title">
                                            <p>Amount Purchased
                                                <div class="ic-info-box-upsells-amount-purchased">
                                                    <svg class="ic-info-button-upsells-amount-purchased" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_710_19499)">
                                                            <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_710_19499">
                                                                <rect width="12" height="12" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <div class="ic-info-text-upsells-amount-purchased">
                                                        Total amount of money you’ve made when your customers added upsell to their cart and finished their purchase. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <h4>-</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row upsell-create-row1 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Properties</h3>
                            <div class="upsell-desc">
                                In the case that two or more upsells are present, the
                                system will choose the upsell with the highest priority.
                            </div>

                            <!-- Button trigger modal -->
                            <button type="button" class="upsell-edit-button preview-upsell" data-bs-toggle="modal" data-bs-target="#upsellPreview">
                                Preview upsell
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="upsellPreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="cart-checkout-tab" data-bs-toggle="tab" data-bs-target="#cart-checkout" type="button" role="tab" aria-controls="cart-checkout" aria-selected="true">Mini cart & Checkout</button>
                                                    <button class="nav-link" id="post-purchase-tab" data-bs-toggle="tab" data-bs-target="#post-purchase" type="button" role="tab" aria-controls="post-purchase" aria-selected="false">Post-purchase</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="cart-checkout" role="tabpanel" aria-labelledby="cart-checkout-tab">
                                                    <div class="upsell-preview"></div>
                                                </div>
                                                <div class="tab-pane fade" id="post-purchase" role="tabpanel" aria-labelledby="post-purchase-tab">
                                                    <div class="pp-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-5 upsell-edit-left-box">
                            <div class="upsell-box">
                                <div class="upsell-box-text">
                                    My upsells
                                </div>
                                <input type="text" name="title" placeholder="My Upsell Title"
                                       class="upsell-create-my-upsells">
                                <label for="Priority"></label>
                                <select name="priority" id="select-priority">
                                    <option value="0">High Priority Upsell</option>
                                    <option value="1">Medium Priority Upsell</option>
                                    <option value="2">Low Priority Upsell</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row upsell-create-row2 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Triggers</h3>
                            <div class="upsell-desc">
                                The triggers are the items that need to be part of the
                                order, for the post purchase upsells to show.
                            </div>
                        </div>
                        <div class="col-5 upsell-create-left-box">
                            <div class="added-triggers-cont"></div>
                            <div class="added-triggers-collections-cont"></div>
                            <div class="upsell-create-actions">
                                <div class="upsell-desc upsell-edit-actions1">Actions</div>
                                <div class="upsell-edit-actions2">
                                    <button type="button" class="btn btn-primary upsell-edit-triggers-add-btn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-plus"></i> Add products
                                    </button>
                                    <div class="modal fade triggers-modal" id="exampleModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select product for
                                                        your upsell offer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-top-body">
                                                        <p class="triggers-selected"><span>0</span> products selected
                                                        </p>
                                                        <p class="select-all-triggers">Select all
                                                            <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                        </p>
                                                        <input type="text" id="search-us-triggers"  placeholder="Search for products">
                                                    </div>
                                                    <div class="modal-middle-body triggers-middle">
                                                        <?php foreach ($products as $product) :
                                                            $wc_product=wc_get_product($product->ID);
                                                            $variations = $wc_product->get_children();

                                                            if ($variations):
                                                                ?>
                                                                <div class="single-product-trigger">
                                                                    <input type="checkbox"
                                                                           value="<?php echo $product->ID; ?>">
                                                                    <?php

                                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                    if ($image) :
                                                                        ?>
                                                                        <img width="32" height="32"
                                                                             src="<?php echo $image[0]; ?>" alt="">
                                                                    <?php else : ?>
                                                                        <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                    <?php endif; ?>
                                                                    <p><?php echo $product->post_title; ?></p>
                                                                </div>
                                                            <?php
                                                                foreach ($variations as $variation):
                                                                    $singleVar = wc_get_product(intval($variation));
                                                                    $varName = $singleVar->get_name();
                                                                    $varId = $singleVar->get_id();
                                                                    ?>
                                                                    <div class="single-product-trigger variation-of-product-<?php echo $product->ID;?>">
                                                                        <input type="checkbox" value="<?php echo $varId; ?>">
                                                                        <?php
                                                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($varId), 'single-post-thumbnail');
                                                                        ?>

                                                                        <?php
                                                                        if (!$image):
                                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                        ?>
                                                                        <?php endif; ?>
                                                                        <?php
                                                                        if ($image) :
                                                                            ?>
                                                                            <img width="32" height="32"
                                                                                 src="<?php echo $image[0]; ?>" alt="">
                                                                        <?php else : ?>
                                                                            <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                        <?php endif; ?>
                                                                        <p><?php echo $varName; ?></p>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php else :  ?>
                                                                <div class="single-product-trigger">
                                                                    <input type="checkbox"
                                                                           value="<?php echo $product->ID; ?>">
                                                                    <?php
                                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                    if ($image) :
                                                                        ?>
                                                                        <img width="32" height="32"
                                                                             src="<?php echo $image[0]; ?>" alt="">
                                                                    <?php else : ?>
                                                                        <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                    <?php endif; ?>
                                                                    <p><?php echo $product->post_title; ?></p>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-primary add-triggers upsell-create-modal-btn-add"
                                                            data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                                                        products
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="upsell-edit-button upsell-edit-button-actions2" data-bs-toggle="modal" data-bs-target="#collectionTrigger"><i
                                                class="fa-solid fa-plus"></i> Add collections
                                    </button>
                                    <div class="modal fade triggers-modal" id="collectionTrigger" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select category for
                                                        your upsell offer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-top-body">
                                                        <p class="triggers-collection-selected"><span>0</span> categories selected
                                                        </p>
                                                        <p class="select-all-triggers-collections">Select all
                                                            <span><?php echo count($categories); ?></span>
                                                        </p>
                                                        <input type="text" id="search-us-triggers-categories" placeholder="Search for categories">
                                                    </div>
                                                    <div class="modal-middle-body triggers-collections-middle">
                                                        <?php foreach ($categories as $category) : ?>
                                                            <div class="single-category-product-trigger">
                                                                <input type="checkbox"
                                                                       value="<?php echo $category->term_id; ?>">
                                                                <?php
//                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
//                                                                if ($image) :
//                                                                    ?>
<!--                                                                    <img width="32" height="32"-->
<!--                                                                         src="--><?php //echo $image[0]; ?><!--" alt="">-->
<!--                                                                --><?php //else : ?>
<!--                                                                    <img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">-->
<!--                                                                --><?php //endif; ?>
                                                                <p><?php echo $category->name; ?></p>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-primary add-collection-triggers upsell-create-modal-btn-add"
                                                            data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                                                        collections
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row upsell-create-row3 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Products</h3>
                            <div class="upsell-desc">
                                After payment, the app will build a funnel and show every item one by one, asking if the
                                customer wants to purchase it directly.
                            </div>
                        </div>
                        <div class="col-5 upsell-create-left-box">
                            <div class="added-products-cont"></div>
                            <div class="added-products-collections-cont"></div>
                            <div class="upsell-create-actions">
                                <div class="upsell-desc upsell-edit-actions1">Actions</div>
                                <div class="upsell-edit-actions2">
                                    <button type="button" class="btn btn-primary upsell-edit-triggers-add-btn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        <i class="fa-solid fa-plus"></i> Add products
                                    </button>
                                    <div class="modal fade products-modal" id="exampleModal2" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select product for your
                                                        upsell offer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-top-body">
                                                        <p class="products-selected"><span>0</span> products selected</p>
                                                        <p class="select-all-products">Select all
                                                            <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                        </p>
                                                        <input type="text" id="search-us-products" placeholder="Search for products">
                                                    </div>
                                                    <div class="modal-middle-body products-middle">
                                                        <?php foreach ($products as $product) :
                                                            $wc_product=wc_get_product($product->ID);
                                                            $variations = $wc_product->get_children();
                                                            if ($variations):
                                                                foreach ($variations as $variation):
                                                                    $singleVar = wc_get_product(intval($variation));
                                                                    $varName = $singleVar->get_name();
                                                                    $varId = $singleVar->get_id();
                                                                    ?>
                                                                    <div class="single-product-product">
                                                                        <input type="checkbox" value="<?php echo $varId; ?>">
                                                                        <?php
                                                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($varId), 'single-post-thumbnail');
                                                                        if (!$image){
                                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                        }
                                                                        if ($image) :
                                                                            ?>
                                                                            <img width="32" height="32" src="<?php echo $image[0]; ?>"
                                                                                 alt="">
                                                                        <?php else : ?>
                                                                            <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                        <?php endif; ?>
                                                                        <p><?php echo $varName; ?></p>
                                                                    </div>
                                                                <?php endforeach;?>
                                                            <?php else:  ?>
                                                                <div class="single-product-product">
                                                                    <input type="checkbox" value="<?php echo $product->ID; ?>">
                                                                    <?php
                                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                    if ($image) :
                                                                        ?>
                                                                        <img width="32" height="32" src="<?php echo $image[0]; ?>"
                                                                             alt="">
                                                                    <?php else : ?>
                                                                        <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                    <?php endif; ?>
                                                                    <p><?php echo $product->post_title; ?></p>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn upsell-create-modal-btn-cancel"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="button" class="btn add-products upsell-create-modal-btn-add"
                                                            data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                                                        products
                                                    </button>
                                                </div>
                                            </div >
                                        </div>
                                    </div>
                                    <button type="button" class="upsell-edit-button upsell-edit-button-actions2" data-bs-toggle="modal" data-bs-target="#collectionProduct"><i
                                                class="fa-solid fa-plus"></i> Add collections
                                    </button>
                                    <div class="modal fade triggers-modal" id="collectionProduct" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select category for
                                                        your upsell offer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-top-body">
                                                        <p class="products-collection-selected"><span>0</span> categories selected
                                                        </p>
                                                        <p class="select-all-products-collections">Select all
                                                            <span><?php echo count($categories); ?></span>
                                                        </p>
                                                        <input type="text" id="search-us-products-categories" placeholder="Search for categories">
                                                    </div>
                                                    <div class="modal-middle-body products-collections-middle">
                                                        <?php foreach ($categories as $category) : ?>
                                                            <div class="single-category-product-product">
                                                                <input type="checkbox"
                                                                       value="<?php echo $category->term_id; ?>">
                                                                <?php
                                                                //                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                //                                                                if ($image) :
                                                                //                                                                    ?>
                                                                <!--                                                                    <img width="32" height="32"-->
                                                                <!--                                                                         src="--><?php //echo $image[0]; ?><!--" alt="">-->
                                                                <!--                                                                --><?php //else : ?>
                                                                <!--                                                                    <img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">-->
                                                                <!--                                                                --><?php //endif; ?>
                                                                <p><?php echo $category->name; ?></p>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-primary add-collection-products upsell-create-modal-btn-add"
                                                            data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                                                        collections
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row upsell-create-row4 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Placing</h3>
                            <div class="upsell-desc">
                                Choose the segments where you want this upsell offer to appear.
                            </div>
                        </div>
                        <div class="col-5 upsell-create-left-box">
                            <div class="upsell-create-checkbox">
                                <input type="checkbox" id="checkout-page" name="checkout-page" checked>
                                <label for="checkout-page">Checkout Page</label>
                            </div>
                            <div class="upsell-create-checkbox">
                                <input type="checkbox" id="cart-page" name="cart-page" checked>
                                <label for="cart-page">Cart Page</label>
                            </div>
                            <div class="upsell-create-checkbox">
                                <input type="checkbox" id="before-ty-page" name="before-ty-page" checked>
                                <label for="before-ty-page">Post-purchase</label>
                            </div>
                        </div>
                    </div>

                    <input id="new-upsell-add-btn" type="button" value="Create Upsell" class="upsell-create-button create-upsell-admin-page"/>

                </form>
            </div>
        </div>
    </div>
</div>
