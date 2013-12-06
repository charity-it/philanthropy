word_list_captcha
 - Because the world list CAPTCHA choices change on every form instance, Drupal thinks that the submitted response is an illegal choice (most of the times). In the Drupal 5 version this could be worked around with #DANGEROUS_SKIP_TEST, but this 'feature' has been removed in Drupal 6: http://drupal.org/node/114774#choice_check .
An alternative is needed.
 - I have implemented the patch from http://drupal.org/node/221420 to address the above