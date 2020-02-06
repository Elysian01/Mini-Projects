
// App Key :-   hdi7h38zpa3ay2s
// App Seret : -    p7uz3dete14ltl3
// Token :- ixasUYYT0iAAAAAAAAAADtVB32RQvi6wJLlU4pjks_xRRZMkjLqGnyfhR65T_H61
package fileuploader;

/**
 *
 * @author abhi
 */
import com.dropbox.core.DbxException;
import com.dropbox.core.DbxRequestConfig;
import com.dropbox.core.v2.DbxClientV2;
import com.dropbox.core.v2.files.FileMetadata;
import com.dropbox.core.v2.files.ListFolderResult;
import com.dropbox.core.v2.files.Metadata;
import com.dropbox.core.v2.files.UploadErrorException;
import com.dropbox.core.v2.users.FullAccount;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStream;
import java.nio.file.Path;
import java.nio.file.Paths;

public class FileUploader {

    private static final String ACCESS_TOKEN = "ixasUYYT0iAAAAAAAAAADtVB32RQvi6wJLlU4pjks_xRRZMkjLqGnyfhR65T_H61";
    public static void main(String[] args) throws DbxException, UploadErrorException, FileNotFoundException, IOException {
        
        
        // Create Dropbox client
        DbxRequestConfig config = DbxRequestConfig.newBuilder("dropbox/JavaProject").build();
        DbxClientV2 client = new DbxClientV2(config,ACCESS_TOKEN);
        // Get current account info
        FullAccount account = client.users().getCurrentAccount();
        System.out.println(account.getName().getDisplayName());
        
        // Uploading
        int flag =0;
        String s = "/home/abhi/Documents/NetBeans/FileUploader/test.txt";
        for(int i=0;i<s.length();i++)
        {
            if (s.charAt(i)=='/')
                flag = i;
              
        }
        String file = s.substring(flag);
        File filepath;
        filepath = new File("/home/abhi/Documents/NetBeans/FileUploader/test.txt");
        System.out.println(filepath.getParent());
        try (InputStream in = new FileInputStream(filepath)) {
        FileMetadata metadata = client.files().uploadBuilder(file)
        .uploadAndFinish(in);
        
        }
        
    }
}


