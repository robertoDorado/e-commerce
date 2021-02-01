<?php
\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Meraki")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Meraki")->setRelease("1.0.0");

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setAccountCredentials('robertodorado7@gmail.com', 'CAA0F164572E4C678487BE8078526A28');
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');