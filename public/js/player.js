$(document).ready(function () {
    const getPlayer = new Request("/api", "player", token);
    // get the player current data
    getPlayer.getAll(
        (res) => {
            // console.log(res);
            playerStatus(res);
        },
        (res) => console.error("failed to get the player info")
    );
});
