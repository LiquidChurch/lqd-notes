# Liquid Notes Email

## Introduction
Email is a bit tricky sometimes. We'll discuss some of those difficulties here and how to work around them.

## Deliverability
Emails, especially emails that are generated like these, can trigger SPAM filters. There is only so much that
can be done to prevent this. One easy step that everyone should take is adding the IP address of the web server
hosting their site as an authorized server in an SPF record.

This can be accomplished by adding the following to one's DNS records for your domain:

- Type: TXT
- Name: somedomain.com
- Content: v=spf1 ipv4:10.10.10.1 a mx ~ all

Definitely consult with your IT team before making any changes (this document assumes you are the IT team!).
You may already have an existing SPF record and need to add to that record rather than creating a new one.
You should also have a list of all other mail servers and add them to the SPF record as well.