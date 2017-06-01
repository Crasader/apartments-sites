<%@ Language=VBScript %>
<%
'Note, session variables:  userID, DBName, affiliation, organization

'dim local variables here
dim formItem

dim strTo
dim strFrom
dim strSubject
dim strBody
dim objCDOMail
dim subject
dim debug

debug = FALSE


fromAddress = request.form("email")


strTo = "400rhett@amcllc.net, leasing@400rhett.com"
'strTo = "matt@marketapts.com"
strFrom = fromAddress 
'strCc = "matt@marketapts.com"
strbCc = "ali@marketapts.com"
strSubject = "Resident Center Contact Request at 400 Rhett Apartments"

' declare mailer variables

strBody = ""

for each formItem in Request.Form
strBody = strBody & formItem & " -- " & Request.Form( formItem ) & "<br>"
next

	set objCDOMail = Server.CreateObject( "CDONTS.NewMail" )
	objCDOMail.MailFormat = CdoMailFormatMIME
	objCDOMail.BodyFormat = CdoBodyFormatHTML

	objCDOMail.From = strFrom
	objCDOMail.Cc = strCc
	objCDOMail.bCc = strbCc
	objCDOMail.To = strTo
	if not fromAddress = "" then
		objCDOMail.CC = fromAddress
	end if

	objCDOMail.Subject = strSubject
	objCDOMail.Body = strBody

	on error resume next

	objCDOMail.Send	
	on error goto 0

			'Set the object to nothing
	set objCDOMail = nothing

	Response.Redirect( "/confirmation.asp" )

if debug then
	for each formItem in Request.Form
		Response.Write( formItem & " -- " & Request.Form( formItem ) & "<br>" )
	next
end if
%>
