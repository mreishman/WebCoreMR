<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $baseXmlGen->title; ?></title>
		<?php if(file_exists(BP . "/media/img/main/favicon.png")): ?>
			<link rel="shortcut icon" type="image/png" href="/media/img/main/favicon.png"/>
		<?php endif; ?>
	</head>
	<body>
		<?php
			$headerModules = $core->getModules($layoutFileGen,"header");
			foreach ($headerModules as $module)
			{
				require_once($module["file"]);
			}
		?>
		<div class="mainContent" >
			<!-- Default content -->
			<?php
				$contentType 		= (string)$core->getSetting(
					array($baseXmlGen, $layoutFileGen),
					array("settings","body","mainContent","content","type"),
					"custom");
				if($contentType !== "custom")
				{
					$module = $core->getModule(array($baseXmlGen, $layoutFileGen), $contentType);
					require_once($module["file"]);
				}
				else
				{
					include($core->getContent($baseXmlGen));
						
				}
			?>
		</div>
		<?php
			$footerModules = $core->getModules($layoutFileGen,"footer");
			foreach ($footerModules as $module)
			{
				require_once($module["file"]);
			}
		?>
	</body>
</html>