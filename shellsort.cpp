#include<iostream>
using namespace std;
int main(){
    int arr[100],i,j,k=0,m,n;
    cin>>n;
    cout<<"input array element"<<endl;
    for(i=0;i<n;i++)
    {
        cin>>arr[i];
    }
  for(i=0;i<n-1;i++){
    int mim=i;
    for(j=i+1;j<n;j++)
    {
        if(arr[j]<arr[mim])
            mim=j;
    }
    if(mim!=i)
    {
      k=arr[mim];
      arr[mim]=arr[i];
      arr[i]=k;
    }
  }
  cout<<"output sorted array"<<endl;
   for(i=0;i<n;i++)
    {
        cout<<arr[i]<<" ";;
    }
    return 0;
}
