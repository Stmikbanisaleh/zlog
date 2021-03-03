<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>A simple, clean, and responsive HTML invoice template</title>

	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.rtl table {
			text-align: right;
		}

		.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>
	<div class="invoice-box">
		<table cellpadding="0" cellspacing="0">
			<tr class="top">
				<td colspan="2">
					<table>
						<tr>
							<td>
								<b>Invoice #: <?= $invoice ?></b><br>
								Dibuat Pada: <?= $createdAt ?><br>
								Jatuh Tempo: <?= $due_date ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="information">
				<td colspan="2">
					<table>
						<?php foreach ($user as $value) {
							echo ' 			<tr>
													<td>
													 	No Pelanggan :'.$value['no_services'].' <br>
														Nama : '.$value['name'].' <br>
														Email : 	 '.$value['email'].' <br>
													 </td>
														<td>
															Alamat :	'.$value['address'].'
														</td>
													 
													 
											 </tr>';
						} ?>

					</table>
				</td>
			</tr>

			<tr class="heading">
				<td>
					Nama Layanan
				</td>

				<td>
					Harga
				</td>
			</tr>
			<?php
			$total = 0;
			foreach ($item_list as $value) {
				echo '
							<tr class="item">
									<td>
											' . $value['nama_layanan'] . '
									</td>
									
									<td>
										Rp. ' . number_format($value['price'], 0, ',', '.') . '
									</td>
					
							</tr>';

				$total += $value['price'];
			}
			?>

			<tr class="total">
				<td></td>

				<td>
					<?php echo 'Rp.' . number_format($total, 0, ',', '.'); ?>
				</td>
			</tr>
		</table>
		<div class="footer">
			<br>
			Untuk informasi lebih lanjut, silakan menghubungi call centre kami:
			<br>
			• 820 (nomor XL)
			<br>
			• 08170123442 (nomor non-XL)
			<br>
			• atau email ke: xlhomecs@xl.co.id
			<br>
			<br>
			Terima kasih
			<br>
			Salam Hangat,

		</div>
	</div>
</body>

</html>
