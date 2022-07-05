<?php function drawUserCard(User $user, bool $isOwner)
{ ?>
    <div class="profile">
        <div class="rowp">
            <div>
                <img src=<?= $user->photoPath ?> class="responsive">
                <h1><?= $user->username ?></h1>
            </div>
            <div class="colp">
                <div>
                    <ul>
                        <h2>Name:</h2>
                    </ul>
                    <ul class="profile-atr"><?= $user->name ?></ul>
                </div>
                <div>
                    <ul>
                        <h2>Email:</h2>
                    </ul>
                    <ul class="profile-atr"><?= $user->email ?></ul>
                </div>
                <div>
                    <ul>
                        <h2>Address:</h2>
                    </ul>
                    <ul class="profile-atr"><?= $user->address ?></ul>
                </div>
                <div>
                    <ul>
                        <h2>Phone:</h2>
                    </ul>
                    <ul class="profile-atr"><?= $user->phone ?></ul>
                </div>
            </div>
        </div>
        <div>
            <a href="userEdit.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" /></a>
        </div>
        <br>
        <div>
            <a href="favRestaurants.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Favorite Restaurants" /></a>
        </div>
        <br>
        <div>
            <a href="favDishes.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Favorite Dishes" /></a>
        </div>
        <br>
        <div>
            <a href="editPassword.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Change Password" /></a>
        </div>
        <br>
        <?php if ($isOwner) { ?>
        <div>
            <a href="management.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Management Page" /></a>
        </div>
        <?php } ?>
        <br>
        <div>
            <a href="logout.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Log Out"/></a>
        </div>
    </div>
<?php } ?>

<?php function drawEditCard(User $user, int $SessionId)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_user.php">
            <div class="rowp">
                <div>
                    <img src=<?= $user->photoPath ?> class="responsive">
                    <h1><?= $user->username ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Username:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="username" value="<?= $user->username ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value="<?= $user->name ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Email:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="email" value="<?= $user->email ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Address:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="address" value="<?= $user->address ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Phone:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="phone" value=<?= $user->phone ?>></ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawEditPassword(User $user)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_password.php?id=<?= $user->id ?>">
            <div class="rowp">
                <div>
                    <img src=<?= $user->photoPath ?> class="responsive">
                    <h1><?= $user->username ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="oldPassword">Old Password:</label><br></h2>
                        </ul>
                        <ul><input type="password" id="fname" name="oldPassword" </ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="newPassword">New Password:</label><br></h2>
                        </ul>
                        <ul><input type="password" id="fname" name="newPassword" </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
    </div>
<?php } ?>