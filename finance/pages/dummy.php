<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<?php
    $genre=["Fantasy", "Harem", "Yuri", "Action", "Adventure","Adventure","Adventure","Adventure","Adventure","Adventure","Adventure"];
    sort($genre);

?>

<div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
            <ul class="list-group list-group-horizontal">
                <li class="col-6 col-sm-2 col-md-2">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
                        href="#list-home" role="tab" aria-controls="list-home">Action <span
                            class="badge bg-primary rounded-pill">14</span></a>
                </li>
                <li class="col-6 col-sm-2 col-md-2">
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list"
                        href="#list-profile" role="tab" aria-controls="list-profile">Adventure <span
                            class="badge bg-primary rounded-pill">14</span></a>
                </li>
            </ul>
            <!-- <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
                href="#list-home" role="tab" aria-controls="list-home">Home</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list"
                href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list"
                href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list"
                href="#list-settings" role="tab" aria-controls="list-settings">Settings</a> -->
        </div>
    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Home
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Profile
            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Message
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Settings
            </div>
        </div>
    </div>
</div>