<?php
	include_once "../../content/theme/{$themename}/frontend-navbar.php";
	include_once "../../content/theme/{$themename}/slick-home-banner.php";

	if(empty($_SESSION["usercode"])) {
		$deuzerked = 0;
	} else {
		$deuzerked = $_SESSION['usercode'];
	}
?>

<style type="text/css">
	.content {
		display: none;
	}

	#loadMore {
		width: 200px;
		color: #fff;
		display: block;
		text-align: center;
		margin: 20px auto;
		padding: 10px;
		border-radius: 10px;
		border: 1px solid transparent;
		background-color: blue;
		transition: .3s;
	}

	#loadMore:hover {
		color: blue;
		background-color: #fff;
		border: 1px solid blue;
		text-decoration: none;
	}

	.noContent {
		color: #000 !important;
		background-color: transparent !important;
		pointer-events: none;
	}
</style>

<script>
	function getIdOnClick(id) {
		var theitemiz = document.getElementById(id).getAttribute('data-item-id');
		var curnzy = document.getElementById(id).getAttribute('data-currency');
		var img = document.getElementById(id).getAttribute('data-value');
		var prodtitle = document.getElementById(id).getAttribute('data-item-name');
		var prodprice = document.getElementById(id).getAttribute('data-price');
		var prodsize = document.getElementById(id).getAttribute('data-size');
		var prodcolor = document.getElementById(id).getAttribute('data-color');
		var prodquality = document.getElementById(id).getAttribute('data-quality');
		var prodstock = document.getElementById(id).getAttribute('data-stock');
		var produnit = document.getElementById(id).getAttribute('data-unit');
		$("#itmvwimgfl3").attr("style","background-image: url('"+img+"');");
		$("#temidon").attr("data-iditem",theitemiz);
		$('#ghtitle').html(prodtitle);
		$('#ghprice').html(curnzy+prodprice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
		$('#ghsize').html(prodsize);
		$('#ghcolor').html(prodcolor);
		$('#ghquality').html(prodquality);
		$('#ghunit').html(prodstock+produnit+" available");
		$("#ghqty").attr("max",prodstock);
	}
</script>

<div class="pt-5 pb-5" style="background-color: transparent;">
	<div id="products" class="container">
		<div class="d-flex flex-wrap w-100">
			<h2 class="mr-5">Products</h2>
			<form>
				<div class="input-group w-auto">
					<input id="category" type="text" class="form-control" placeholder="All Category" name="category" onkeyup="categoryResult(this.value);" list="categoryList" style="max-width: max-content;">
					<datalist id="categoryList">
					<?php
						$stmtcategory = $cnn->prepare("SELECT * FROM tblitem WHERE deletedx=0 GROUP BY category ORDER BY category ASC");
						$stmtcategory->execute();
						$resultcategory = $stmtcategory->setFetchMode(PDO::FETCH_ASSOC);
						foreach ($stmtcategory as $rowcategory) {
							echo "<option value='".$rowcategory['category']."'>";
						}
					?>
					</datalist>
				</div>
			</form>
		</div>

		<div id="listofproducts">
			<?php
				include_once "allproducts.php";
			?>
		</div>
	</div>
</div>

<div class="modal" id="ymModalItemPreviewFront">
	<div class="modal-dialog">
		<div class="modal-content">
			<button type="button" class="close text-right mr-1" data-dismiss="modal">&times;</button>
			<div class="modal-body">
				<img id="itmvwimgfl3">
				<div class="position-absolute">
					<div class="card">
						<div class="card-body text-right">
							<h5 id="ghtitle" class="card-title"></h5>
							<h4 id="ghprice" class="card-text"></h4>
							<p class="mb-0" id="ghsize"></p>
							<p class="mb-0" id="ghcolor"></p>
							<p class="mb-0 d-none" id="ghquality"></p>
							<div class="d-flex">
								<div class="input-group fit-product-qty">
									<input type="button" value="-" class="button-minus" data-field="quantity">
									<input id="ghqty" type="number" step="1" min="1" value="1" name="quantity" class="addminusentry text-center" onkeydown="if(event.key==='.'){event.preventDefault();}" oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
									<input type="button" value="+" class="button-plus" data-field="quantity">
								</div>
								<p id="ghunit"></p>
							</div>
							<a id="temidon" href="#" class="btn btn-danger w-100" onclick="fnPopToCart(this.id);" data-iditem>Add to Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	if ( empty($geomap) ) {
		echo "<p align='center'>Can't Load Map.</p>";
	} else {
		echo '<iframe class="responsive-iframe map-footer" src="https://maps.google.com/maps?q='.$geomap.'&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
	}
?>

<script>
	$(document).ready(function() {
		$(".content").slice(0, 8).show();$(window).scroll(function() {
			if($(window).scrollTop() == $(document).height() - $(window).height()) {
				$(".content:hidden").slice(0, 4).show();
				if($(".content:hidden").length == 0) {
					$("#loadMore").text("...").addClass("noContent");
				}
			}
		});

		$("#loadMore").on("click", function(e){
			e.preventDefault();
			$(".content:hidden").slice(0, 4).show();
			if($(".content:hidden").length == 0) {
				$("#loadMore").text("...").addClass("noContent");
			}
		});

		$("#searchproduct").focus();
	});

	function fnAddToCartz(itemid) {
		var dircz = "<?php echo $domainhome; ?>";
		var userCode = "<?php echo $deuzerked; ?>";
		if (userCode==0) {
			console.log('No User');
			alert('Login first before you can order.');
			window.open(dir+'routes/login', '_self');
		} else {
			console.log(userCode);
			// Add to Cart
			window.open(dircz+'content/view/products/tocart.php?itemid='+itemid+'&uid='+userCode+'&gqty=1', '_self');
		}
	}

	function fnPopToCart(e) {
		var h = document.getElementById(e).getAttribute('data-iditem');
		var kuantity = document.getElementById("ghqty").value;
		var dirg = "<?php echo $domainhome; ?>";
		var userCodeg = "<?php echo $deuzerked; ?>";
		console.log(h);
		console.log(userCodeg);
		if (userCodeg==0) {
			console.log('No User');
			alert('Login first before you can order.');
			window.open(dirg+'routes/login', '_self');
		} else {
			console.log(userCodeg);
			// Add to Cart
			if ( kuantity==0 || kuantity=='' ) {
				window.open(dirg+'content/view/products/tocart.php?itemid='+h+'&uid='+userCodeg+'&gqty=1', '_self');
			} else {
				window.open(dirg+'content/view/products/tocart.php?itemid='+h+'&uid='+userCodeg+'&gqty='+kuantity, '_self');
			}
		}
	}

	function categoryResult(str) {
		var dirert = "<?php echo $domainhome; ?>";
		if (str == "") {
			location.reload();
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("listofproducts").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", dirert+"content/view/products/vwcategory.php?category=" + str, true);
			xmlhttp.send();
		}
	}
</script>