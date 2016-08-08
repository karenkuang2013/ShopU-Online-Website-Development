<?php

session_start();

/**
 * Class Items
 */
class Items extends Controller
{
    public $categories; // List of all categories for categories
                        // section in sell items page (loaded from db)

    /**
     * Show all items
     */
    public function index()
    {
        $search = null;
        $items = $this->item_model->getAllItems();
        $category = null;
        $categories = $this->item_model->getAllCategories();
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/items/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * If user not signed in, redirect to sign in page
     * Else, display view to sell an item
     */
    public function sellItem()
    {
        $categories = $this->item_model->getAllCategories();

        if (empty($_SESSION)) {
            $error = 'You must be signed in to be able to sell items!';
            require APP . 'view/_templates/header.php';
            require APP . 'view/errors/errorbox.php';
            require APP . 'view/users/signin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/items/sell_item.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * Get an item by its id
     * @param type $id
     */
    public function getItem($id)
    {
        $item = $this->item_model->getItem($id);
        $categories = $this->item_model->getAllCategories();
        $search = null;
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/navigation.php';
        require APP . 'view/items/item.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * This function is used to show user the order confirmation.
     * Users can review their ordered item before they buy it
     * @param type $id
     */
    public function orderConfirm($id)
    {
        if (empty($_SESSION)) {
            // redirect to items index if unregistered user manually
            // attempts to purchase an item through the URL
            header('location: ' . URL . 'items/index');
        } else {
            $item = $this->item_model->getItem($id);
            $categories = $this->item_model->getAllCategories();
            $search = null;
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            require APP . 'view/items/item_confirmation.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * This function is used to inform user of the message of successful order
     * @param type $id
     */
    public function orderSuccess($id)
    {
        if (empty($_SESSION)) {
            // redirect to items index if unregistered user manually
            // attempts to purchase an item through the URL
            header('location: ' . URL . 'items/index');
            
        } else {
            $item = $this->item_model->getItem($id);
            $categories = $this->item_model->getAllCategories();
            $search = null;
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            require APP . 'view/items/success.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    /**
     * Add item to database
     */
    public function addItem()
    {
        if (isset($_POST['submit_add_item'])) {

            // store reference to the file uploaded into $file
            $file = $_FILES["image"]["tmp_name"];

            // Convert the category selection to its key for db storage
            $categoryId = $this->item_model->getCategoryKey($_POST["category"]);
            
            $image = null; // image null by default
            
            // if returns false, not an image or no image selected
            if ($file != null && getimagesize($file)) {
                parent::resizeImage($file);
                $image = file_get_contents($file);
            }
            
            $this->item_model->addItem($_POST["title"], $_SESSION["user_id"], $_POST["price"],
                    $categoryId, $_POST["description"], $_POST["keywords"], $image);

            // where to go after item is added
            header('location: ' . URL . 'items/index');
        } else {
            // redirect to sell item page if user visits /item/additem manually
            header('location: ' . URL . 'items/sellitem');
        }
    }
    
    public function buttonCategories() 
    {
        $categories = $this->item_model->getAllCategories();
        // check submit from button
        if (isset($_GET['buttons'])) {
            $category = $_GET['buttons'];
            $categoryId = $this->item_model->getCategoryKey($category);
            $items = $this->item_model->getAllItemsFromCategory($categoryId);
            $search = null;
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            require APP . 'view/items/index.php';
            require APP . 'view/_templates/footer.php'; 
        } 
    }
}
