<?php

ini_set('memory_limit','500M');




            $sUserAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2112.0 Safari/537.36';
            $sContent = '';
            $ch = curl_init();
            !empty($aHeaders) ?curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders):'';
            !empty($sProxy)   ?curl_setopt($ch, CURLOPT_PROXY, $sProxy):'';

            if(!empty($sPostData))
            {
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS,$sPostData);

            curl_setopt($ch, CURLOPT_USERAGENT,$sUserAgent);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,$iConnectionTimeOut);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, $iTimeOut);
            curl_setopt($ch, CURLOPT_URL, $sURL);
            curl_setopt($ch, CURLOPT_ENCODING, "gzip");
            $sContent = curl_exec($ch);
            $aInfo = curl_getinfo($ch);
            //print_r($aInfo);
            curl_close($ch);
            $sContent = str_replace("\t","",$sContent);
            $sContent = str_replace("\r","",$sContent);
            $sContent = str_replace("\n","",$sContent);
            return $sContent;
    }

function parse_page($url_array){



			$doc = new \DOMDocument('1.0', 'UTF-8');
				//Cancel error
				$internalErrors = libxml_use_internal_errors(true);
					//Load target URL into new doc
					$doc->loadHTML(file_get_contents("https://uk.eu-supply.com/ctm/Supplier/PublicTenders/ViewNotice/17195"));
						//Error handler
						libxml_use_internal_errors($internalErrors);
							//Clear errors
							libxml_clear_errors($internalErrors);


				$xpath = new DOMXpath($doc);
					$tags1 = $xpath->query('//*[@type="checkbox" and not(@checked)][contains(normalize-space(following-sibling::text()[position()="1"]), "Text 1")]
');

  if ($tags1) {
    echo "done!";
  } else {
    echo "None";
  }




										$tags2 = $xpath->query('//div[contains(text()="Is this suitable for SME (Small and Medium Enterprises)?:")]');
										$tags3 = $xpath->query('//div[5]');
										$tags6 = $xpath->query('//div[2]/text()');
										$tags7 = $xpath->query('//pre');
										$tags4 = $xpath->query('//p');
										$tags8 = $xpath->query('//div[@class="content"]/div/text()');







}

	// run_all();
    ?>
