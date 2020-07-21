<?php
include 'functions.php';
// Your PHP code here.
if(isset($_GET['action'])) {
	$products = simplexml_load_file('product.xml');
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	foreach($products->product as $product){
		if($product['id']==$id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($products->product[$index]);
	file_put_contents('product.xml', $products->asXML());
}
$products = simplexml_load_file('product.xml');
//echo 'Number of products: '.count($products);
//echo '<br>List Product Information';
// Home Page template below.

?>

<?=template_header('Home')?>

<div class="content">
	<h2>Home</h2>
	
</div>
<br>

<!--<a href='create.php'> 
        <button class="btn"> 
            ADD CONTACTS 
        </button> 
    </a>--> 
<br>

<table align="center" cellpadding="2" cellspacing="2" border="1">
<caption>XML DATA</caption>
	<tr>
	<thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                
            </tr>
        </thead>
	</tr>
	<?php foreach($products->product as $product) { ?>
	<tr>
		<td><?php echo $product['id']; ?></td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $product->email; ?></td>
		<td><?php echo $product->phone; ?></td>
		<!--<td><a href="update.php?id=<?php echo $product['id']; ?>">Edit</a> |
			<a href="delete.php?action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>-->
	</tr>
	<?php } ?>
</table>
<?=template_footer()?>