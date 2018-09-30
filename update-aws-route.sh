#!/bin/bash

#Enable logging to SYSLOG...
exec 1> >(logger -s -t $(basename $0)) 2>&1

IP=$( curl http://169.254.169.254/latest/meta-data/public-ipv4 )
echo "IP to update: $IP"

DNS_NAME=$(aws ec2 describe-tags --filters "Name=resource-id,Values=$(curl -s http://169.254.169.254/latest/meta-data/instance-id)" --region us-east-1 "Name=key,Values=DNS_NAME" | jq ".Tags[0].Value")

echo "Setting DNS NAME : $DNS_NAME to IP ADDRESS : $IP"

#HOSTED_ZONE_ID=$( aws route53 list-hosted-zones-by-name | grep -B 1 -e "lambrospetrou.com" | sed 's/.*hostedzone\/\([A-Za-z0-9]*\)\".*/\1/' | head -n 1 )

HOSTED_ZONE_ID="/hostedzone/Z262KZCUAHZ4HU"

echo "Hosted zone being modified: $HOSTED_ZONE_ID"

if [ -z "$BASH_SOURCE" ]; then
  SOURCE="$0"
else
  SOURCE="${BASH_SOURCE[0]}"
fi

SCRIPT=$(readlink -f $SOURCE)
# Absolute path this script is in, thus /home/user/bin
SCRIPTPATH=$(dirname "$SCRIPT")

INPUT_JSON=$( cat $SCRIPTPATH/update-aws-route.json | sed "s/IP_ADDRESS/$IP/" | sed "s/DNS_NAME/$DNS_NAME/" )

echo $INPUT_JSON
# http://docs.aws.amazon.com/cli/latest/reference/route53/change-resource-record-sets.html
# We want to use the string variable command so put the file contents (batch-changes file) in the following JSON
INPUT_JSON="{ \"ChangeBatch\": $INPUT_JSON }"

aws route53 change-resource-record-sets --hosted-zone-id "$HOSTED_ZONE_ID" --cli-input-json "$INPUT_JSON"
