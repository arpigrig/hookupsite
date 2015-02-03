=============
Usage Records
=============

Twilio offers a Usage Record API so you can better measure how much you've been
using Twilio. Here are some examples of how you can use PHP to access the usage
API.

Retrieve All Usage Records
==========================

.. code-block:: php

    $client = new Services_Twilio('AC123', '456bef');
    foreach ($client->account->usage_records as $record) {
        echo "Record: $record";
    }

Retrieve Usage Records For A Time Interval
==========================================

UsageRecords support `several convenience subresources
<http://www.twilio.com/docs/api/rest/usage-records#list-subresources>`_ that
can be accessed as properties on the `record` object.

.. code-block:: php

    $client = new Services_Twilio('AC123', '456bef');
    foreach ($client->account->usage_records->last_month as $record) {
        echo "Record: $record";
    }

Retrieve All Time Usage for A Usage Category
============================================

By default, Twilio will return your all-time usage for a given usage category.

.. code-block:: php

    $client = new Services_Twilio('AC123', '456bef');
    $callRecord = $client->account->usage_records->getCategory('calls');
    echo $callRecord->usage;

Retrieve All Usage for a Given Time Period
==========================================

You can filter your UsageRecord list by providing `StartDate` and `EndDate`
parameters.

.. code-block:: php

    $client = new 