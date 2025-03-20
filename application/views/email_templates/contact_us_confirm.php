<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<style type="text/css">

		@media print {
			* {
				print-color-adjust: exact;
				-webkit-print-color-adjust: exact;
			}
		}
		@media (max-width: 557px) {
			.video-testimonials {
				display: block;
			}
			.branch {
				padding-left: 0;
				padding-right: 0;
			}
			.address-details {
				padding-left: 5px !important;
			}
			.m_-2735755841837326336container {
				width: 100% !important;
				margin: 0 !important;
			}
			.m_-2735755841837326336img-social {
				padding: 0 !important;
				width: 21.7px !important;
				height: 21.7px !important;
			}
			body {
				font-size: 80%;
			}
		}
	</style>
</head>
<body>


<table style="border-collapse:collapse;border-spacing:0;width: 85%;margin: 0 auto;">
	<tbody>
	<tr>
		<td align="center">
			<table style="border-collapse:collapse;width: 100%;border-spacing:0">
				<tbody>
				<tr>
					<td bgcolor="#ffffff">
						<table style="border-collapse:collapse;width: 100%;border-spacing:0" border="0">
							<tbody>
							<tr>
								<td>
									<table style="border-collapse:collapse;border-spacing:0;width: 100%;border:0">
										<tbody>
										<tr>
											<td>
												<table style="width: 100%;">
													<tbody>
													<tr>
														<td valign="top">
															<div style="background-color: #f3f1f1;">
																<table style="margin-bottom: 2%;">
																	<tr>
																		<td style="width: 80%;">
																			<a class="navbar-brand" href="<?php echo base_url()?>">
																				<img src="<?php echo IMAGE_PATH?>logo.png" style="width: 100px;padding-top: 3%;padding-left: 7%;">
																			</a>
																		</td>
																		<td style="width: 20%;">
																			<table style="margin:0 auto;">
																			</table>
																		</td>
																	</tr>
																</table>
																<table style="margin:0 8.4%; padding-bottom: 20px;">
																	<tr>

																		<td style="font-size: 13px;" >
																			Dear <?php echo $name ?>
																		</td>

																	</tr>
																</table>
																<table style="margin:0 8.4%; padding-bottom: 20px;">
																	<tr>
																		<td style="font-size: 13px;" >
																			<p style="font-size: 91%;">Your Details:</p><br>
																			<ul style="margin:0;color:#424242;font-size:13px;line-height:20px;font-family:Arial,Helvetica,sans-serif;text-align:left">
																				<li style="list-style: none">Name: <b><?php echo $name ?></b></li>
																				<li style="list-style: none">Email: <b style="color: #000000"><?php echo $email ?></b></li>
																				<li style="list-style: none">Phone: <b><?php echo $phone ?></b></li>
																				<?php
																				if ($message) {
																					echo '<li style="list-style: none">Message: <b>'.$message.'</b></li>';
																				}
																				?>
																			</ul>
																		</td>

																	</tr>
																</table>
																<table style="margin:0 8.4%;padding-bottom: 20px;">
																	<tr>
																		<td style="font-size: 91%;line-height: 1.2;">
																			Thank you for expressing your interest in <?php echo WEBSITE_NAME?>
																		</td>

																	</tr>
																</table>
															</div>
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			</table>
		</td>
	</tr>
	</tbody>
</table>
</body>
</html>


