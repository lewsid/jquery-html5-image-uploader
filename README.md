jquery-html5-image-uploader
===========================

A minimalistic HTML5 drag-and-drop image uploader for use with JQuery. 

[](https://raw.github.com/lewsid/jquery-html5-image-uploader/master/img/example.png)

Installation
------------

**Note:** There is a fully functional example (example.html) already included that utilizes PHP for handling the server-side post.

1. Pop the contents of the repo into your web-accessible document root.
2. Make sure you end up with an *uploads* folder with the appropriate write permissions.
3. Insert the following lines into the header:

    ```html
    <link rel="stylesheet" href="css/style.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
    ```
4. Place the following code where you'd like the uploader interface to appear on your page:

    ```html
    <div class="filedrag" style="width: 500px;">
      <label class="filedrag-filename"></label>
      <img class="filedrag-preview" src="/img/placeholder.gif">
      <div class="filedrag-droparea">drop image (or click)</div>
      <div class="filedrag-progress"></div>
      <input type="file" class="filedrag-input" id="file-input" name="file-input">
    </div>
    ```

5. Initialize the uploader:

    ```javascript
    $(function () {
      initUploaders('post_handler.php');
    });
    ```
    
6. Implement server-side post handling. Here's an example of how this is achieved in PHP:

    ```php
    <?php
    
    $filename = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
    $file = file_get_contents('php://input');
    $type = "image/" . $parameters['filetype'];
    
    if(file_put_contents(__DIR__ . '/uploads/' . $filename, $file)) {
      echo json_encode(array('success' => 1, 'error' => 0));
    }
    else { echo json_encode(array('success' => 0, 'error' => 'error writing file')); }
    ```
    
Usage
-----

1. Click on, or drag an image into, the dotted area to start the upload process. A preview will be visible while the image uploads.
2. The image will be placed into the uploads folder.

Configuration Options
---------------------

*...are fairly limited at this point.*

You can wire in a custom callback, to be called once the image has successfully uploaded, an example of which can be found in the included example. It looks like this:

```javascript
//Custom callback example
function responseCallback(response) {
  console.log(response);
}

$(function () {
  initUploaders('post_handler.php', 'responseCallback');
});
```

Contact
-------

- Christopher Lewis (chris@bluehousegroup.com)
- github.com/lewsid
