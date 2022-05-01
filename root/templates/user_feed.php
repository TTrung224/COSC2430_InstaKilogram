<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="user-main-feed">
        <form action="" class="upload-img-section">
                <p>Let's share something!</p>
                <textarea name="img-desciption" id="img-desciption" cols="30" rows="1" placeholder="Write a description"></textarea>
                <div class="img-sharing-levels">
                    <div>
                        <label for="image-input-file">Add an image:</label>
                        <input type="file" id="image-input-file">
                    </div>
                    <div>
                        <label for="img-option">Sharing level</label>
                        <select name="img-option" id="img-option">
                            <option value="Public">Public</option>
                            <option value="Internal">Internal</option>
                            <option value="Private">Private</option>
                        </select>
                    </div>
                </div>
                <div class="img-sharing-btns">
                    <button type="reset" >Cancel</button>
                    <button type="submit" >Upload</button>
                </div>
                
        </form>
    </div>
</body>
</html>