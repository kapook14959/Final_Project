

function CreateUser(status) {
    console.log("Click Create User");
    if (status) {
        window.location.href = "../../views/create-user/create-user.php";
    }
}
function EditUser(status) {
    console.log("Click Edit User");
    if (status) {
        window.location.href = "../../views/edit-user/edit-user.php?id="+ status;
    }
}
function CreateAssets(status) {
    console.log("Click Create Assets");
    if (status) {
        window.location.href = "../../views/create-assets/create-assets.php";
    }
}
function EditAssets(status) {
    console.log("Click Edit Assets");
    if (status) {
        window.location.href = "../../views/edit-assets/edit-assets.php?id="+ status;
    }
}
function Log_out(status){
    if (status) {
        window.location.href = "../../assets/db/logout_action.php";
    }
}
function ShowSubmenu(status){
    if(status){
        document.getElementById("hide").style.display = "block";
    }
}
function HideSubmenu(status){
    if(status){
        document.getElementById("hide").style.display = "none";
    }
}
function searchBox(query){
    if(query){
        window.location.href = "../../views/detail-assets/detail-assets.php?q="+ query.value;
    }
}
function GoBack(status){
    if(status){
        window.history.back();
    }
}